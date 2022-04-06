<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;

Route::get('/settings/{option}', function ($option) {
    $title = [
        'general' => 'Általános beállítások',
        'meta' => 'Meta adatok',
        'contact' => 'Kapcsolat oldal'
    ];

    return view('admin.settings.' . $option, [
        'openmenu' => '#settingsmenu',
        'title' => $title[$option]
    ]);
})->name('admin.settings');

Route::post('/settings/store', [SettingController::class, 'store'])->name('admin.post.settings.store');
