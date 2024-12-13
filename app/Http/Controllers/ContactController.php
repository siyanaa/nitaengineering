<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all();
        return view('admin.contact.index',[
            'page_title'=> 'Contact Index',
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => "nullable|string",
            'email' => "required|string",
            'phone' => "nullable|integer",
            'message' => "nullable|string",
            'g-recaptcha-response' => 'required', function($attribute, $value, $fail) {

                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                 'secret' => config('services.recaptcha.secret_key'),
                 'response' => $value,
                 'remoteip' => \request()->ip()
                ]);

             //    dd($g_response->json());


                 if (!$g_response->json('success')) {
                     $fail('The '.$attribute.' is invalid.');
                 }
             },

         ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect('/');
    }


    public function newstore(Request $request)
    {
        //
        $request->validate([
            'name' => "required|string",
            'email' => "required|string",
            'phone' => "required|integer",
            'message' => "required|string",
            'g-recaptcha-response' => 'required', function($attribute, $value, $fail) {

                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                 'secret' => config('services.recaptcha.secret_key'),
                 'response' => $value,
                 'remoteip' => \request()->ip()
                ]);

             //    dd($g_response->json());


                 if (!$g_response->json('success')) {
                     $fail('The '.$attribute.' is invalid.');
                 }
             },

         ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->route('render_contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact,$id)
    {
        //
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('admin/contact/index')->with(['successMessage' => 'Success !! Contact Updated']);
    }
}
