<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/Home', [ProductController::class, 'index'])->name('home');

Route::get('/products/{product:name}', [ProductController::class, 'show'])->name('products.show');

Route::prefix('delivery')->group(function () {
    Route::get('/', function () {
        return view('delivery.index');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
});

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/{product:name}', [CartController::class, 'add'])->name('cart.add');