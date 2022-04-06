<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;


Route::get('/categories/add', function () {

    $cats = [];
    $cats[0] = 'Főkategória';
    foreach (Category::all() as $cat) {
        $cats[$cat->id] = $cat->name;
    }

    return view('admin.categories.add', [
        'categories' => $cats,
        'openmenu' => '#categoriesmenu'
    ]);
})->name('admin.categories.add');

Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.post.categories.store');


//----------------

Route::get('/categories/list', function () {

    return view('admin.categories.list', [
        'categories' => Category::paginate(2),
        'openmenu' => '#categoriesmenu'
    ]);
})->name('admin.categories.list');

//-------------------

Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');


//--edit

Route::post('/categories/edit/{category}', [CategoryController::class, 'update'])->name('admin.post.categories.edit');
Route::delete('/categories/delete/{category}', [CategoryController::class, 'delete'])->name('admin.post.categories.delete');