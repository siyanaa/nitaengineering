<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('admin.service.index',[
            'page_title'=> 'Service Index',
            'services' => $services,
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
        return view('admin.service.create',[
            'page_title' => 'Create Service',
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
            'title'=> 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'icon' => 'required|image|mimes:png|max:1200',
            'description'=> 'required|string',
        ]);

        $newimage = time() . '.' .$request->image->extension();
        $request->image->move(public_path('uploads/service/'), $newimage );

        $newicon = time() . '.' .$request->icon->extension();
        $request->icon->move(public_path('uploads/service/'), $newicon);



        $service = new Service;
        $service->title=$request->title ?? '';
        $service->slug = SlugService::createSlug(Service::class, 'slug', $request->title);
        $service->description=$request->description ?? '';
        $service->image= $newimage ?? '';
        $service->icon= $newicon ?? '';

        $service->save();
        return redirect('admin/service/index')->with(['successMessage' => 'Success !! Service Created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service , $id)
    {
        //
        $service = Service::find($id);
        return view('admin.service.update',['service'=> $service,'page_title'=> 'Update Service']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $this->validate($request,[
            'title'=> 'nullable|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'icon' => 'image|mimes:png|max:1200',
            'description'=> 'required|string',
        ]);

        $service = Service::find($request->id);

        if ($request->hasFile('image')) {
            
            $newimage = time() . '.' .$request->image->extension();
            $request->image->move(public_path('uploads/service/'), $newimage );

            Storage::delete('public/uploads/service/' . $service->image);
            $service->image =  $newimage;
        }
        if ($request->hasFile('icon')) {
            
            $newicon = time() . '.' .$request->icon->extension();
            $request->icon->move(public_path('uploads/service/'), $newicon );

            Storage::delete('public/uploads/service/' . $service->icon);
            $service->icon =  $newicon;
        }

        
        $service->title=$request->title ?? '';
        $service->slug = SlugService::createSlug(Service::class, 'slug', $request->title);
        $service->description=$request->description ?? '';
        // $service->image=$newimage ?? '';

        $service->save();
        return redirect('admin/service/index')->with(['successMessage' => 'Success !! Service Created']);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        //
        $service = Service::find($id);
        $service->delete();
        return redirect('admin/service/index')->with(['successMessage'=> 'Success !! Service Updated']);
    }
}
