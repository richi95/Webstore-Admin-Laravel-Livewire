<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController, App\Http\Controllers\Admin\CategoryController;
use App\Models\Setting, App\Models\Category, App\Models\Image;
use App\Http\Controllers\Admin\ImageController;

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

Route::group(['prefix'=>'admin'], function(){

    Route::get('/', function () {
        return view('admin.login');
    });

        Route::group(['middleware'=>['admin']], function(){

            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            });

            Route::get('/settings/{option}', function ($option){
                $title=[
                    'general'=>'Általános beállítások',
                    'meta'=>'Meta adatok',
                    'contact'=>'Kapcsolat oldal'
                ];
 
                return view('admin.settings.'.$option, [
                    'openmenu' => '#settingsmenu',
                    'title'=>$title[$option]
                ]);
            })->name('admin.settings');

            Route::post('/settings/store', [SettingController::class,'store'])->name('admin.post.settings.store');

            // --------------------------------


            Route::get('/categories/add', function (){

                $cats = [];
                $cats[0]='Főkategória';
                foreach( Category::all() as $cat ){
                    $cats[$cat->id] = $cat->name;
                }

                return view('admin.categories.add', [
                    'categories' => $cats, 
                    'openmenu'=>'#categoriesmenu'
                ]);
            })->name('admin.categories.add');

            Route::post('/categories/store', [CategoryController::class,'store'])->name('admin.post.categories.store');


            //----------------

            Route::get('/categories/list', function (){
  
                return view('admin.categories.list', [
                    'categories' => Category::paginate(2), 
                    'openmenu'=>'#categoriesmenu'
                ]);
            })->name('admin.categories.list');

            //-------------------

            Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');


                //--edit

            Route::post('/categories/edit/{category}', [CategoryController::class, 'update'])->name('admin.post.categories.edit');

            //---képek
            Route::get('/images/add', function (){
 
                return view('admin.images.add', [
                    'openmenu'=>'#imagesmenu'
                ]);
            })->name('admin.images.add');
        });

        
        Route::post('/images/add', [ImageController::class,'add'])->name('admin.post.images.add');

        Route::get('/images/list', function (){
  
            return view('admin.images.list', [
                'images' => Image::paginate(2), 
                'openmenu'=>'#imagesesmenu'
            ]);
        })->name('admin.images.list');


        Route::get('/images/edit/{image}', function(Image $image){
            return view('admin.images.edit', [
                'item'=>$image
            ]);
        })->name('admin.images.edit-view');

        Route::post('/images/edit/{image}', [ImageController::class, 'edit'])->name('admin.images.edit');

});


