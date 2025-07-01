<?php

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

