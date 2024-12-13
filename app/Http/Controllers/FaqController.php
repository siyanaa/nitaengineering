<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all();

        return view('admin.faq.index', [
            'page_title' => "FAQ index",
            'faq' => $faq
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create', [
            'page_title' => 'Create FAQ',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $faq = new Faq();

        $faq->title = $request->title;    
        $faq->description = $request->description; 
        
        $faq->save();

        return redirect()->route('admin.faq.index')->with(['successMessage' => 'Success!! FAQ created']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq, $id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.update', [
            'faq' => $faq,
            'page_title' => 'Update FAQ'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $faq = Faq::find($request->id);

        $faq->title = $request->title;    
        $faq->description = $request->description; 
        
        $faq->save();

        return redirect()->route('admin.faq.index')->with(['successMessage' => 'Success!! FAQ updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq, $id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with(['successMessage' => 'Success!! FAQ deleted']);
    }
}
