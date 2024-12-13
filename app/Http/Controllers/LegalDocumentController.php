<?php

namespace App\Http\Controllers;

use App\Models\LegalDocument;
use Illuminate\Http\Request;

class LegalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $legaldocuments = LegalDocument::paginate(20);
        return view('admin.legaldocument.index',[
            'page_title' => 'Index',
            'legaldocuments' => $legaldocuments,
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
        return view('admin.legaldocument.create',[
            'page_title' => 'CreateLegalDocument',
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
            'file' => "nullable|file|max:4000",
        ]);

       

        if ($request->hasFile('file')){
            $postPath = $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/legaldocument/file'), $postPath );
        }else{
                $postPath = "NoFile";
        }


        $legaldocument = new LegalDocument();

        $legaldocument->title = $request->title;
      
        $legaldocument->file = $postPath;

        $legaldocument->save();

        return redirect()->route('admin.legaldocument.index')->with(['successMessage' => 'Success!! Legaldocument created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegalDocument  $legalDocument
     * @return \Illuminate\Http\Response
     */
    public function show(LegalDocument $legalDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegalDocument  $legalDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(LegalDocument $legalDocument, $id)
    {
        //
        
        $legaldocument = LegalDocument::find($id);
        return view('admin.legaldocument.update', [
            'legaldocument' => $legaldocument,
            'page_title' => 'Update legaldocument'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegalDocument  $legalDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LegalDocument $legalDocument)
    {
        //
        $this->validate($request, [
            'title' => 'required|string',
            'file' => "nullable|file|max:4000"
        ]);

        $legaldocument = LegalDocument::find($request->id);

       
        if ($request->hasFile('file')){
            $postPath = $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/legaldocument/file'), $postPath );
        }else{
                $postPath = "NoFile";
        }

        $legaldocument->title = $request->title;
    
        $legaldocument->file = $postPath;

        if ($legaldocument->save()) {
            return redirect()->route('admin.legaldocument.index')->with(['successMessage' => 'Success !! News Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error News not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegalDocument  $legalDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalDocument $legalDocument, $id)
    {
        //
        $legaldocument = LegalDocument::find($id);
        $legaldocument->delete();
        
        return redirect('admin/legaldocument/index')->with(['successMessage' => 'Success !! Legal Document Updated']);
    }
}
