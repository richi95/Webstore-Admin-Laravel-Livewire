<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    function __construct()
    {
        $this->rules = [
            "parent_id" => 'required|numeric',
            "name" => 'required|min:2|max:200',
            "slug" => 'required|min:2|max:200|alpha_dash|unique:categories',
            "seo_title" => 'nullable|min:30|max:60',
            "seo_description" => 'nullable|min:30|max:200',
            "seo_keywords" => 'nullable|min:10|max:200',
        ];
    }

    function store(Request $request){

        $validated =  $request->validate($this->rules);

        if( $request->hasfile('file') )
            $path = $request->file('file')->store('uploads/categories');

        $validated['file'] = $path ?? null;

        Category::create( $validated );

        return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres mentés!']);
    }

    function edit( Category $category ){
       
                $cats = [];
                $cats[0]='Főkategória';
                foreach( Category::all() as $cat ){
                    $cats[$cat->id] = $cat->name;
                }

            return view('admin.categories.edit', [
                'item' => $category, 
                'categories'=>$cats,
                'openmenu'=>'#categoriesmenu'
            ]);
    }

    function update( Category $category , Request $request ){

        $this->rules["slug"] .= ',slug,'.$category->id;

        $validated =  $request->validate($this->rules);

        if( $request->has('delete_img') && $request->delete_img ){
            $path = '';
           
        } else {

            if( $request->hasfile('file') )
                $path = $request->file('file')->store('uploads/categories');

        }    

        $validated['file'] = isset($path) ? $path : $category->file;

        $category->update( $validated );

        return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres mentés!']);
    
    }

}
