<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/members/add', function(){
    return view('admin.members.add');
})->name('admin.members.add');
Route::get('/members/list', function(){
    return view('admin.members.list')->with('users', User::all());
})->name('admin.members.list');