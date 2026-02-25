<?php

use App\Http\Controllers\Account\EditProfileController;
use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function (){

    Route::get('/', 'index')->name('index');
    Route::get('{product}', 'show')->name('show');
});

Route::prefix('account')->name('account.')->middleware('auth')->group(function (){

   Route::get('orders', [OrderController::class, 'index'])->name('orders');

   Route::prefix('edit-profile')->name('edit-profile.')->controller(EditProfileController::class)->group(function (){

       Route::get('/', 'index')->name('index');
       Route::post('/', 'post')->name('post');
   });
});

