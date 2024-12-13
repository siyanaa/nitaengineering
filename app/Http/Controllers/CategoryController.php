<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', [
            "categories" => $categories,
            "page_title" => "Categories"
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
        return view('admin.categories.create', [
            'page_title' => 'Create Category'
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
            'title' => 'required',
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->save();

        return redirect(route('admin.categories.index'))->with(['successMessage' => 'Success !! Category created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //
        $category = Category::find($id);
        return view('admin.categories.update', [
            'category' => $category,
            'page_title' => 'Update Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate($request, [
            'title' => 'required|string'
        ]);

        $category = Category::find($request->id);
        $category->title = $request->title;

        $category->save();

        return redirect(route('admin.categories.index'))->with(['successMessage' => 'Success !! Category updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        //
        $category = Category::find($id);
        $category->delete();

        return redirect(route('admin.categories.index'))->with(['successMessage' => 'Success !! Category destroyed']);
    }
}
