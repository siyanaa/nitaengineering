<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', [
            'page_title' => "News Index",
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'page_title' => "Create News"
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
        $request->image->move(public_path('uploads/news/image'), $newImage);

        if ($request->hasFile('file')){
            $postPath = $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/news/file'), $postPath );
        }else{
                $postPath = "NoFile";
        }

        $news = new News();

        $news->title = $request->title;
        $news->description = $request->description;

        $news->image = $newImage;
        $news->file = $postPath;

        $news->save();

        return redirect()->route('admin.news.index')->with(['successMessage' => 'Success!! News created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, $id)
    {
        $news = News::find($id);
        return view('admin.news.update', [
            'news' => $news,
            'page_title' => 'Update News'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "file" => "nullable|file|max:4000"
        ]);

        $news = News::find($request->id);

        $newImage = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/news/image'), $newImage);

        if ($request->hasFile('file')){
            $postPath = $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/news/file'), $postPath );
        }else{
                $postPath = "NoFile";
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->image = $newImage;
        $news->file = $postPath;

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with(['successMessage' => 'Success !! News Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error News not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news, $id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with(['successMessage' => 'Success !! News Deleted']);;
    }
}
