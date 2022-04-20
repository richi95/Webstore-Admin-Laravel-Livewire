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
    function store(Request $request)
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
            'description' => 'nullable'
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
                'document' => $documents_json,
                'image' => $images_json,
                'main_image' => json_encode(['title' => '', 'file' => $request->main_image])
            ]);

            return response(['success' => true], 200);
        }
    }
    function edit(Product $product, Request  $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:2|max:60',
            'slug' => 'required|min:2|max:60',
            'seo_title' => 'nullable|min:2|max:80',
            'seo_keywords' => 'nullable|min:2|max:200',
            'seo_description' => 'nullable|min:2|max:200',
            'price' => 'required',
            'hotprice' => 'nullable',
        ]);

     

            $product->update(
                [
                    "category_id" => $request-> category_id,
                    "name" => $request-> name,
                    "main_page_highlight" => $request->main_page_highlight ? 1 : 0 ,
                    "category_highlight" => $request-> category_highlight ? 1:0,
                    "discount" => $request->discount ? 1:0 ,
                    "user_reviews" => $request->user_reviews?1:0 ,
                    "adjustable_quantity" => $request->adjustable_quantity?1:0 ,
                    "nocount" => $request->nocount?1:0 ,
                    "slug" => $request->slug ,
                    "seo_title" => $request->seo_title ,
                    "seo_description" => $request->seo_description ,
                    "seo_keywords" => $request->seo_keywords ,
                    "price" => $request-> price,
                    "hotprice" => $request->hotprice ,
                    "description" => $request-> description
                ]);
       

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

            $product->update([
                'document' => $documents_json,
                'image' => $images_json,
<<<<<<< HEAD
                'main_image' => json_encode( Image::find( $request->main_image ) )
=======
                'main_image' => json_encode([Image::find($request->main_image)])
>>>>>>> 9f8f433de33eb8dc583d64236b292d7c62a12307
            ]);

            return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres módosítás!']);;
         
    }
    

    function list()
    {
        return view('admin.products.list', [
            'openmenu' => '#productsmenu',
            'products' => Product::get()
        ]);
    }
    

    function delete(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    function cart(){
        // $_SESSION["cart"][10] = [
        //     'product'=>Product::find(10),
        //     'qtty' => 1
        // ];

        $prod = Product::find(10);
        $prod->qtty = 1;
        $prod->subtotal = 1 * $prod->price;

    }

}
