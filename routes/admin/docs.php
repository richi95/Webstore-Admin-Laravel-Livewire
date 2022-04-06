<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DocsController;
use App\Models\Document;

Route::get('/docs/add', function () {

    return view('admin.docs.add', [
        'openmenu' => '#docsmenu'
    ]);
})->name('admin.docs.add');



Route::post('/docs/add', [DocsController::class, 'add'])->name('admin.post.docs.add');

Route::get('/docs/list', function () {

    return view('admin.docs.list', [
        'docs' => Document::paginate(2),
        'openmenu' => '#docsmenu'
    ]);
})->name('admin.docs.list');


Route::get('/docs/edit/{docs}', function (Document $docs) {
    return view('admin.docs.edit', [
        'item' => $docs
    ]);
})->name('admin.docs.edit-view');

Route::post('/docs/edit/{docs}', [DocsController::class, 'edit'])->name('admin.docs.edit');
Route::delete('/docs/delete/{docs}', [DocsController::class, 'delete'])->name('admin.docs.delete');
