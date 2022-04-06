<?php

use Illuminate\Support\Facades\Route;

Route::get('/products/add', function(){
    return view('admin.products.add', ['item'=>'']);
})->name('admin.products.add');

Route::get('/products/list', function(){
    return view('admin.products.list');
})->name('admin.products.list');