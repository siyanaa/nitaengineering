<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::with('get_categories')->paginate(10);
        return view('admin.post.index', [
            "posts" => $posts,
            "page_title" => "Posts"
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
        $categories = Category::all();
        return view('admin.post.create', [
            "categories" => $categories,
            "page_title" => "Create Post"
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
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'content' => 'required|string',
            'categories' => 'required'
        ]);

        $newImageName = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/posts/image'), $newImageName);

        $post = new Post;
        $post->title = $request->title;
        $post->image = $newImageName;
        $post->content = $request->content;

        if ($post->save()) {
            // dd($post);
            $post->get_categories()->sync($request->categories);
            return redirect('admin/posts/index')->with(['successMessage' => 'Success !! Post created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.post.update', [
            'post' => $post,
            'categories' => $categories,
            'page_title' => 'Update Post'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'content' => 'required|string',
            'categories' => 'required'
        ]);

        $post = Post::find($request->id);

        $newImageName = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/posts/image'), $newImageName);

        $post->title = $request->title;
        $post->image = $newImageName;
        $post->content = $request->content;

        if ($post->save()) {
            $post->get_categories()->sync($request->categories);
            return redirect('admin/posts/index')->with(['successMessage' => 'Success !! Post updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        //
        $post = Post::find($id);
        if ($post->delete()) {
            $post->get_categories()->detach();
            Storage::delete('uploads/posts/image/' . $post->image);
            return redirect('admin/posts/index')->with(['successMessage' => 'Success !! Post deleted']);
        }
    }
}
