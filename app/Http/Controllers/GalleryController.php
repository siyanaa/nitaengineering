<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\ImageConverter;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::all();
        return view('admin.gallery.index', ['galleries' => $galleries, 'page_title' => 'Gallery Index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gallery.create', [
            'page_title' => 'Create Gallery',
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
        $this->validate($request, [
            'title' => 'required|string',
            // 'description' => 'required|string',
            'image.*' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5555',
        ]);

        $images = $request->file('image');
        $path = 'uploads/gallery/';
        $convertedImages = ImageConverter::convertImages($images, $path);



        $gallery = new Gallery;

        $gallery->title = $request->title;
        $gallery->slug = SlugService::createSlug(Gallery::class, 'slug', $request->title);
        // $gallery->description = $request->description;
        $gallery->image = $convertedImages;

        $gallery->save();

        return redirect('admin/gallery/index')->with(['successMessage' => 'Success !! Gallery created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery, $id)
    {
        //
        $gallery = Gallery::find($id);
        return view('admin.gallery.update', ['gallery' => $gallery, 'page_title' => 'Update Gallery']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request)
     {
         $this->validate($request, [
             'id' => 'required|exists:galleries,id',
             'title' => 'required|string',
             'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:1536',
         ]);
 
         $gallery = Gallery::findOrFail($request->id);
 
         // Update title and slug
         $gallery->title = $request->title;
         $gallery->slug = SlugService::createSlug(Gallery::class, 'slug', $request->title);
 
         // Handle image upload if new images are provided
         if ($request->hasFile('images')) {
             $images = $request->file('images');
             $path = 'uploads/gallery/';
             
             // Delete old images
             if ($gallery->image) {
                 $oldImages = is_string($gallery->image) ? json_decode($gallery->image, true) : $gallery->image;
                 if (is_array($oldImages)) {
                     foreach ($oldImages as $oldImage) {
                         if (Storage::exists($oldImage)) {
                             Storage::delete($oldImage);
                         }
                     }
                 }
             }
             
             // Convert and store new images
             $convertedImages = ImageConverter::convertImages($images, $path);
             $gallery->image = json_encode($convertedImages);
         }
 
         $gallery->save();
 
         return redirect('admin/gallery/index')
             ->with('successMessage', 'Gallery updated successfully!');
     }
 
 
    
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery, $id)
    {
        //
        $gallery = Gallery::find($id);

        $gallery->delete();

        return redirect('admin/gallery/index')->with(['successMessage' => 'Success !!Image Deleted']);
    }
}
