<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('admin.client.index', [
            'page_title' => 'Client Index',
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create', [
            'page_title' => 'Client Create'
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $newImage = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/client/image'), $newImage);

        $client = new Client();
        $client->title = $request->title;
        $client->image = $newImage;

        $client->save();
        return redirect()->route('admin.client.index')->with(['successMessage' => 'Success!! Client created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, $id)
    {
        $client = Client::find($id);
        return view('admin.client.update', [
            'client' => $client,
            'page_title' => "Update Client"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $client = Client::find($request->id);

        $newImage = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/client/image'), $newImage);

        $client->title = $request->title;
        $client->image = $newImage;

        $client->save();

        return redirect()->route('admin.client.index')->with(['successMessage' => 'Success!! Client updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, $id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('admin.client.index')->with(['successMessage' => 'Success!! Client deleted']);
    }
}
