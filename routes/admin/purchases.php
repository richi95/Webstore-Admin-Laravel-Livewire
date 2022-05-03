<?php

use App\Http\Controllers\Admin\PurchaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Views\Purchases;
use App\Models\Purchase;

Route::get('/purchases', Purchases::class)->name('admin.purchases');

// Route::get('/purchases', function () {
//     return view('admin.purchases.list', [
//         'purchases' => Purchase::paginate(3)
//     ]);
// })->name('admin.purchases');

// Route::get('/purchases/edit/{purchase}', function (Purchase $purchase) {
//     return view('admin.purchases.edit',['purchase'=>$purchase]);
// })->name('admin.purchases.edit');

// Route::get('/purchases/delete/{purchase}', function (Purchase $purchase) {

//     $purchase->delete();

//     return view('admin.purchases.list',[
//         'purchases' => Purchase::paginate(10)
//     ]);
// })->name('admin.purchases.delete');

// Route::get('/purchases/10', function () {
//     return view('admin.purchases.list', [
//         'purchases' => Purchase::paginate(1)
//     ]);
// })->name('admin.purchases.10');

// Route::get('/purchases/20', function () {
//     return view('admin.purchases.list', [
//         'purchases' => Purchase::paginate(2)
//     ]);
// })->name('admin.purchases.20');

// Route::get('/purchases/50', function () {
//     return view('admin.purchases.list', [
//         'purchases' => Purchase::paginate(50)
//     ]);
// })->name('admin.purchases.50');

// Route::get('/purchases/100', function () {
//     return view('admin.purchases.list', [
//         'purchases' => Purchase::paginate(100)
//     ]);
// })->name('admin.purchases.100');

// Route::get('/purchases/200', function () {
//     return view('admin.purchases.list', [
//         'purchases' => Purchase::paginate(200)
//     ]);
// })->name('admin.purchases.200');

// Route::get('/search', [PurchaseController::class, 'search'])->name('admin.purchases.search');
// Route::post('/purchases/edit', [PurchaseController::class, 'update'])->name('admin.post.purchases.update');
