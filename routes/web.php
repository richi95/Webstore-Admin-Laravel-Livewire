<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function(){

    Route::get('/', [AdminAuthController::class,'getLogin'])->name('admin.login');
    Route::post('/', [AdminAuthController::class,'postLogin'])->name('admin.post.login');

    Route::group(['middleware' => ['adminauth']], function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::post('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.post.dashboard');

        include __DIR__.'/admin/settings.php';

        include __DIR__.'/admin/categories.php';

        include __DIR__.'/admin/images.php';
        
        include __DIR__.'/admin/docs.php';
        
        include __DIR__.'/admin/products.php';
    });

});
