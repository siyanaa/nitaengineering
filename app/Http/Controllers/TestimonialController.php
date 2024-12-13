<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',[
            'page_title'=> 'Testimonial Index',
            'testimonials'=>$testimonials,
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
        return view('admin.testimonial.create',[
            'page_title'=> 'Create Testimonial'
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
        //
        $this->validate($request,[
            'name'=> 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'position'=>'nullable|string',
            'description'=> 'required|string',
        ]);

        $newimage = time() . '-' . $request->name. '.' .$request->image->extension();
        $request->image->move(public_path('uploads/testimonial/'), $newimage );

        $testimonial = new Testimonial;
        $testimonial->name=$request->name ?? '';
        $testimonial->position=$request->position ?? '';
        $testimonial->description=$request->description ?? '';
        $testimonial->image=$newimage ?? '';

        $testimonial->save();
        return redirect('admin/testimonial/index')->with(['successMessage' => 'Success !! testimonial Created']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial, $id)
    {
        //
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.update',['testimonial'=> $testimonial,'page_title'=> 'Update testimonial']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Testimonial $testimonial)
    // {
    //     //

    //     $this->validate($request,[
    //         'name'=> 'nullable|string',
    //         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
    //         'position' => 'nullable|string',
    //         'description'=> 'required|string',
    //     ]);

    //     $testimonial = Testimonial::find($request->id);

    //     if ($request->hasFile('image')) {

    //         $newimage = time() . '-' . $request->name . '.' .$request->image->extension();
    //         $request->image->move(public_path('uploads/testimonial/'), $newimage );

    //         Storage::delete('public/uploads/testimonial/' . $testimonial->image);
    //         $testimonial->image =  $newimage;
    //     }


    //     $testimonial->name=$request->name ?? '';
    //     $testimonial->description=$request->description ?? '';
    //     $testimonial->position=$request->position ?? '';
    //     $testimonial->image=$request->newimage ?? '';

    //     $testimonial->save();
    //     return redirect('admin/testimonial/index')->with(['successMessage' => 'Success !! testimonial Created']);

    // }

    public function update(Request $request, Testimonial $testimonial)
{
    $this->validate($request, [
        'name' => 'nullable|string',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
        'position' => 'nullable|string',
        'description' => 'required|string',
    ]);

    $testimonial = Testimonial::find($request->id);

    if ($request->hasFile('image')) {
        $newimage = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/testimonial/'), $newimage);

        Storage::delete('public/uploads/testimonial/' . $testimonial->image);
        $testimonial->image = $newimage;
    }

    $testimonial->name = $request->name ?? '';
    $testimonial->description = $request->description ?? '';
    $testimonial->position = $request->position ?? '';

    $testimonial->save();
    return redirect('admin/testimonial/index')->with(['successMessage' => 'Success !! testimonial Updated']);
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial, $id)
    {
        //
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect('admin/testimonial/index')->with(['successMessage'=> 'Success !! testimonial Updated']);
    }
}
