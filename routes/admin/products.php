<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;
use App\Models\Document;
use App\Http\Controllers\Admin\ProductController;


Route::get('/products/add', function(){
 
    return view('admin.products.add', [
            'item'=>'', 
            'images'=>Image::all(),
            'docs' => Document::orderBy('title')->get()
        ]);
})->name('admin.products.add');


Route::post('/products/add', [ProductController::class, 'store'])->name('admin.post.products.add');

// Route::get('/products/add/gallery', function(){
//     return view('admin.products.gallery');
// })->name('admin.products.add.gallery');

Route::get('/products/list', [ProductController::class, 'list'])->name('admin.products.list');