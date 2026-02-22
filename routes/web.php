<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('{product}', 'show')->name('show');
});

