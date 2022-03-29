<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    function store(Request $request){

        $validated =  $request->validate([
        "parent_id" => 'required|numeric',
        "name" => 'required|min:2|max:200',
        "slug" => 'required|min:2|max:200|alpha_dash|unique:categories',
        "seo_title" => 'nullable|min:30|max:60',
        "seo_description" => 'nullable|min:30|max:200',
        "seo_keywords" => 'nullable|min:10|max:200',
        ]);

        Category::create( $validated );

        return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres mentés!']);
    }
}
