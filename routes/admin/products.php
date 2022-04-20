<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;
use App\Models\Document;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;

Route::get('/products/add', function () {

    return view('admin.products.add', [
        'item' => '',
        'openmenu' => '#productsmenu',
        'images' => Image::all(),
        'docs' => Document::orderBy('title')->get()
    ]);
})->name('admin.products.add');

Route::get('/products/edit/{product}', function (Product $product) {
    return view('admin.products.edit', [
        'openmenu' => '#productsmenu',
        'products' => $product,
        'images' => Image::orderBy('title')->get(),
        'docs' => Document::orderBy('title')->get()
    ]);
})->name('admin.products.edit');

Route::post('/products/edit/{product}',  [ProductController::class, 'edit'])->name('admin.post.products.edit');

Route::post('/products/add', [ProductController::class, 'store'])->name('admin.post.products.add');
 

// Route::get('/products/add/gallery', function(){
//     return view('admin.products.gallery');
// })->name('admin.products.add.gallery');

Route::get('/products/list', [ProductController::class, 'list'])->name('admin.products.list');
Route::delete('/products/delete/{product}', [ProductController::class, 'delete'])->name('admin.products.delete');
