<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;
use App\Models\Setting;

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
                    'meta'=>'Meta adatok'
                ];
 
                return view('admin.settings.'.$option, [
                    'openmenu' => '#settingsmenu',
                    'title'=>$title[$option]
                ]);
            })->name('admin.settings');

            Route::post('/settings/store', [SettingController::class,'store'])->name('admin.post.settings.store');

        });

});


