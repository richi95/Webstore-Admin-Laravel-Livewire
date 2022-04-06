<?php

use Illuminate\Support\Facades\Route;

Route::get('/products/add', function(){
    return view('admin.products.add', ['item'=>'']);
})->name('admin.products.add');

Route::get('/products/add/gallery', function(){
    return view('admin.products.gallery');
})->name('admin.products.add.gallery');

Route::get('/products/list', function(){
    return view('admin.products.list');
})->name('admin.products.list');