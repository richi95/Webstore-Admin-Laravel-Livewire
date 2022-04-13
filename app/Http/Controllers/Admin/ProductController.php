<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Document;
use App\Models\Image;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function store(Request  $request)
    {

        $validated = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required|min:2|max:60',
            'slug' => 'required|min:2|max:60',
            'seo_title' => 'nullable|min:2|max:80',
            'seo_keywords' => 'nullable|min:2|max:200',
            'seo_description' => 'nullable|min:2|max:200',
            'price' => 'required',
            'hotprice' => 'nullable',
        ]);

        if ($validated->fails())
            return response($validated->errors(), 200);
        else {

            $product = Product::create($request->except(['images', 'documents', '_token', '_method', 'main_image']));

            $documents = [];
            foreach ((array)$request->documents as $doc) {
                $documents[] = Document::find($doc);
            }

            $images = [];
            foreach ((array)$request->images as $img) {
                $images[] = Image::find($img);
            }


            $documents_json = json_encode($documents);
            $images_json = json_encode($images);

            Product::findOrFail($product->id)->update([
                'documents' => $documents_json,
                'images' => $images_json,
                'main_image' => json_encode(['title' => '', 'file' => $request->main_image])
            ]);

            return response(['success' => true], 200);
        }
    }
    function edit(Request  $request)
    {

        $validated = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required|min:2|max:60',
            'slug' => 'required|min:2|max:60',
            'seo_title' => 'nullable|min:2|max:80',
            'seo_keywords' => 'nullable|min:2|max:200',
            'seo_description' => 'nullable|min:2|max:200',
            'price' => 'required',
            'hotprice' => 'nullable',
        ]);

        if ($validated->fails())
            return response($validated->errors(), 200);
        else {

            $product = Product::updateorcreate($request->except(['images', 'documents', '_token', '_method', 'main_image']));

            $documents = [];
            foreach ((array)$request->documents as $doc) {
                $documents[] = Document::find($doc);
            }

            $images = [];
            foreach ((array)$request->images as $img) {
                $images[] = Image::find($img);
            }


            $documents_json = json_encode($documents);
            $images_json = json_encode($images);

            Product::findOrFail($product->id)->update([
                'documents' => $documents_json,
                'images' => $images_json,
                'main_image' => json_encode(['title' => '', 'file' => $request->main_image])
            ]);

            return response(['success' => true], 200);
        }
    }
    

    function list()
    {
        return view('admin.products.list', [
            'products' => Product::get()
        ]);
    }
    

    function delete(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
