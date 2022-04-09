<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function store(Request  $request){
 
            $validated = Validator::make($request->all(), [
                'category_id'=>'required', 
                'name'=>'required|min:2|max:60', 
                'slug'=>'required|min:2|max:60', 
                'seo_title'=>'nullable|min:2|max:80', 
                'seo_keywords'=>'nullable|min:2|max:200', 
                'seo_description'=>'nullable|min:2|max:200',
                'price'=>'required', 
                'hotprice'=>'nullable' 
        ]);

        if( $validated->fails())
            return response( $validated->errors() , 200 );
        else 
            {
             
                Product::create( $request->except(['images', 'documents', '_token', '_method', 'main_image']) );
                return response( [] , 200 );
            }    

    }
}
