<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/{product:name}', [CartController::class, 'add'])->name('cart.add');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.show');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');