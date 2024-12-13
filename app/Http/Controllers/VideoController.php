<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(50);
        return view('admin.video.index',  [
            'videos' => $videos, 
            'page_title' => 'Video'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create', [
            'page_title' => 'Create Video'
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
            'description' => 'nullable|string',
            'vid_url' => 'required|url',
        ]);

        $video = new Video();
        $video->title = $request->title;
        // $video->description = $request->description;
        $video->slug = SlugService::createSlug(Video::class, 'slug', $request->title);

        $video->vid_url = $request->vid_url;

        $video->save();

        return redirect()->route('admin.video.index')->with(['successMessage' => 'Success !! Video created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video, $id)
    {
        $video = Video::find($id);
        return view('admin.video.update', [
            'video' => $video, 
            'page_title' => 'Update Video'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'vid_url' => 'required|url',
        ]);

        $video = Video::find($request->id);

        $video->title = $request->title;
        // $video->description = $request->description;
        $video->slug = SlugService::createSlug(Video::class, 'slug', $request->title);

        $video->vid_url = $request->vid_url;

        if ($video->save()) {
            return redirect()->route('admin.video.index')->with(['successMessage' => 'Success !! Videos Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Videos not updated']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video, $id)
    {
        $video = Video::find($id);
        $video->delete();

        return redirect()->route('admin.video.index')->with(['successMessage' => 'Success !! Video Deleted']);
    }
}
