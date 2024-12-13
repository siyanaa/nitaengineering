<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricing = Pricing::all();

        return view('admin.pricing.index', [
            'page_title' => 'Pricing Index',
            'pricing' => $pricing
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricing.create', [
            'page_title' => "Create Pricing"
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
            'description' => 'required|string',
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "file" => "nullable|file|max:4000"
        ]);

        $newImage = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/pricing/image'), $newImage);

        if ($request->hasFile('file')) {
            $postPath = $request->title . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/pricing/file'), $postPath);
        } else {
            $postPath = "NoFile";
        }

        $pricing = new Pricing();
        $pricing->title = $request->title;
        $pricing->description = $request->description;

        $pricing->image = $newImage;
        $pricing->file = $postPath;

        $pricing->save();

        return redirect()->route('admin.pricing.index')->with(['successMessage' => 'Success!! Pricing created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing, $id)
    {
        $pricing = Pricing::find($id);
        return view('admin.pricing.update', [
            'pricing' => $pricing,
            'page_title' => 'Update Pricing'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricing $pricing)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "file" => "nullable|file|max:4000"
        ]);

        $pricing = Pricing::find($request->id);

        $newImage = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/pricing/image'), $newImage);

        if ($request->hasFile('file')) {
            $postPath = $request->title . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/pricing/file'), $postPath);
        } else {
            $postPath = "NoFile";
        }

        $pricing->title = $request->title;
        $pricing->description = $request->description;
        $pricing->image = $newImage;
        $pricing->file = $postPath;

        if ($pricing->save()) {
            return redirect()->route('admin.pricing.index')->with(['successMessage' => 'Success !! Pricing Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Pricing not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing, $id)
    {
        $pricing = Pricing::find($id);
        $pricing->delete();

        return redirect()->route('admin.pricing.index')->with(['successMessage' => 'Success!! Pricing Deleted']);
    }
}
