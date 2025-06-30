<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.index');
});

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

