<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{

    function __construct()
    {
        $this->rules = [
            'file' => 'required|file',
            'title' => 'nullable|min:2|max:200'
        ];
    }

    function add(Request $request)
    {
        $validated = $request->validate($this->rules);

        $path = $request->file('file')->store('uploads/images');

        $validated["file"] = $path;

        Image::create($validated);

        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Sikeres mentés!']);
    }

    function edit(Image $image, Request $request)
    {

        $this->rules['file'] = 'nullable|file';

        $validated = $request->validate($this->rules);

        if ($request->hasfile('file'))
            $path = $request->file('file')->store('uploads/images');
        else {
            $path = $image->file;
        }

        $validated["file"] = $path;

        $image->update($validated);

        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Sikeres mentés!']);
    }

    function delete(Image $image)
    {
        Image::find($image->id)->delete();
        return redirect()->back();
    }
}
