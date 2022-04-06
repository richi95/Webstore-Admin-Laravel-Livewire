<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;
use App\Http\Controllers\Admin\ImageController;


Route::get('/images/add', function () {

    return view('admin.images.add', [
        'openmenu' => '#imagesmenu'
    ]);
})->name('admin.images.add');


Route::post('/images/add', [ImageController::class, 'add'])->name('admin.post.images.add');

Route::get('/images/list', function () {

return view('admin.images.list', [
    'images' => Image::paginate(2),
    'openmenu' => '#imagesmenu'
]);
})->name('admin.images.list');


Route::get('/images/edit/{image}', function (Image $image) {
return view('admin.images.edit', [
    'item' => $image
]);
})->name('admin.images.edit-view');

Route::post('/images/edit/{image}', [ImageController::class, 'edit'])->name('admin.images.edit');
Route::delete('/images/delete/{image}', [ImageController::class, 'delete'])->name('admin.images.delete');
