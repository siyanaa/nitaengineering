<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.project.index',[
            'page_title' => 'Project Index',
            'projects' => $projects,
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
        return view('admin.project.create',[
            'page_title' => 'Create Project',
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
            'title' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'description' => 'required|string',
            'file' => 'file|max:10000',


        ]);

        $newimage = time() . '-' . '.' .$request->image->extension();
        $request->image->move(public_path('uploads/project/image'), $newimage );

        if ($request->hasFile('file')) {
        $otherfile = time() . '-' . $request->title . '.' .$request->file->extension();
        $request->file->move(public_path('uploads/project/file'), $otherfile );
        }
        
        $project = new Project;
        $project->title=$request->title ?? '';
        $project->image= $newimage ?? '';
        $project->file = $otherfile ?? '';
        $project->slug = SlugService::createSlug(Project::class, 'slug', $request->title);
        
        $project->description=$request->description ?? '';

        $project->save();
        return redirect('admin/project/index')->with(['successMessage'=> 'Success !! Project created']);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, $id)
    {
        //
        $project = Project::find($id);
        return view('admin.project.update',[
            'project' => $project,
            'page_title' => 'Update project'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $this->validate($request,[
            'title' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'description' => 'required|string',
            'file' => 'file|max:10000',


        ]);

        $project = Project::find($request->id);

        if ($request->hasFile('image')) {
            
            $newimage = time() . '-' . '.' .$request->image->extension();
            $request->image->move(public_path('uploads/project/image'), $newimage );

            Storage::delete('public/uploads/project/image' . $project->image);
            $project->image =  $newimage;
        }
        if ($request->hasFile('file')) {
            $filepath = time() . '-' . $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/project/file'), $filepath);
            Storage::delete('public/uploads/project/file' . $project->file);
            $project->file = $filepath;  

        }
        $project->title=$request->title ?? '';
        $project->image=$newimage ?? '';
        $project->slug = SlugService::createSlug(Project::class, 'slug', $request->title);

        $project->file =$filepath ?? '';
        $project->description=$request->description ?? '';

        $project->save();
        return redirect('admin/project/index')->with(['successMessage'=> 'Success !! Project created']);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, $id)
    {
        //
        $project = Project::find($id);
        $project->delete();
        return redirect('admin/project/index')->with(['successMessage'=> 'Success !! Project Updated']);
    }
}
