<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocsController extends Controller
{

    function __construct()
    {
        $this->rules = [
            'file'=>'required|file',
            'title' => 'nullable|min:2|max:200'
        ];
    }

    function add(Request $request){
        $validated = $request->validate($this->rules);

        $path = $request->file('file')->store('uploads/documents');

        $validated["file"] = $path;

        Document::create($validated);

        return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres mentés!']);

    }
    
    function edit(Document $docs, Request $request){
        
        $this->rules['file']='nullable|file';

        $validated = $request->validate($this->rules);

        if( $request->hasfile('file') )
            $path = $request->file('file')->store('app/uploads/documents');
        else {
            $path = $docs->file;
        }   
        
        $validated["file"] = $path;

        $docs->update($validated);

        return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres mentés!']);
    }

    function delete(Document $docs)
    {
        Document::find($docs->id)->delete();
        return redirect()->back();
    }
}
