<?php

use App\Http\Controllers\Admin\MembersController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Livewire\Members\Add;

// Route::get('/members/add', Add::class)->name('livewire.members.add');

Route::get('/members/add', function(){
    return view('admin.members.add', [
        'openmenu' => '#membersmenu',
    ]);
})->name('admin.members.add');

Route::get('/members/list', function(){
    return view('admin.members.list', [
        'openmenu' => '#membersmenu',
    ])->with('users', User::all());
})->name('admin.members.list');

Route::get('/members/edit/{user}',function(User $user){
    return view('admin.members.edit', [
        'user' => $user,
    ]);
})->name('admin.members.edit');

Route::post('/members/add', [MembersController::class,'store'])->name('admin.post.members.add');

Route::post('/members/billing/add', [MembersController::class,'billing_store'])->name('admin.post.billing.add');