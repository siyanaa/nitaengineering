<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sitesettings = SiteSetting::all();
        return view('admin.sitesetting.index',
        [
            'page_title'=> 'Sitesetting Index',
            'sitesettings' => $sitesettings,

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
        return view('admin.sitesetting.create',[
            'page_title'=> 'Create Sitesetting'
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
            'address'=>'nullable|string',
            'phone'=>'nullable|string',
            'email'=>'nullable|string',
            'global_certification'=>'nullable|string',
            'facebook_link'=>'nullable|string',
            'instagram_link'=>'nullable|string',
            'twitter_link'=>'nullable|string',
            'github_link'=>'nullable|string',
            'main_logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            
        ]);



        
        $sitesetting = new SiteSetting;

        if($sitesetting->hasFile('main_logo')){
        $newMainLogo = time() . '-mainlogo' . '.' .$request->main_logo->extension();
        $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo );
    }


    if($sitesetting->hasFile('side_logo')){       
         $newSideLogo = time() . '-sidelogo' . '.' .$request->side_logo->extension();
        $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo );

    }



        $sitesetting->address=$request->address ?? '';
        $sitesetting->phone=$request->phone ?? '';
        $sitesetting->email=$request->email ?? '';
        $sitesetting->global_certification=$request->global_certification ?? '';
        $sitesetting->facebook_link=$request->facebook_link ?? '';
        $sitesetting->instagram_link=$request->instagram_link ?? '';
        $sitesetting->twitter_link=$request->twitter_link ?? '';
        $sitesetting->github_link=$request->github_link ?? ''; 
        $sitesetting->main_logo=$newMainLogo ?? '';
        $sitesetting->side_logo=$newSideLogo ?? '';
     
        $sitesetting->save();

        return redirect('admin/sitesetting/index')->with(['successMessage' => 'Success !! SiteSetting Created']);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting, $id)
    {
        //
        $sitesetting = SiteSetting::find($id);
        return view('admin.sitesetting.update', ['sitesetting' => $sitesetting,
    'page_title'=> 'Update Sitesetting']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        //
        $this->validate($request,[
            'address'=>'string',
            'phone'=>'string',
            'email'=>'string',
            'global_certification'=>'string',
            'facebook_link'=>'string',
            'instagram_link'=>'string',
            'twitter_link'=>'string',
            'github_link'=>'string',
            'main_logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
           

        ]);

        $sitesetting = SiteSetting::find($request->id);
        
        if ($request->hasFile('main_logo')) {
            
            $newMainLogo = time() . '-mainlogo' . '.' .$request->main_logo->extension();
            $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo );

            Storage::delete('public/uploads/sitesetting/' . $sitesetting->main_logo);
            $sitesetting->main_logo =  $newMainLogo;
        }

        if ($request->hasFile('side_logo')) {
            
            $newSideLogo = time() . '-sidelogo' . '.' .$request->side_logo->extension();
            $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo );

            Storage::delete('public/uploads/sitesetting/' . $sitesetting->side_logo);
            $sitesetting->side_logo =  $newSideLogo;
        }
      
        $sitesetting->address=$request->address ?? '';
        $sitesetting->phone=$request->phone ?? '';
        $sitesetting->email=$request->email ?? '';
        $sitesetting->global_certification=$request->global_certification ?? '';
        $sitesetting->facebook_link=$request->facebook_link ?? '';
        $sitesetting->instagram_link=$request->instagram_link ?? '';
        $sitesetting->twitter_link=$request->twitter_link ?? '';
        $sitesetting->github_link=$request->github_link ?? '';
        // $sitesetting->main_logo=$newMainLogo ?? '';
        // $sitesetting->side_logo=$newSideLogo ?? '';
       
        $sitesetting->save();

        return redirect('admin/sitesetting/index')->with(['successMessage' => 'Success !! SiteSetting Created']);

    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $siteSetting,$id)
    {
        //
        $sitesetting = SiteSetting::find($id);
        $sitesetting->delete();
        
        return redirect('admin/sitesetting/index')->with(['successMessage' => 'Success !! Sitesettings Updated']);
    }
}
