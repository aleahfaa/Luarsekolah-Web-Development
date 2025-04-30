<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cleaning-products', [ProductController::class, 'cleaningProducts'])->name('cleaning-products');
Route::get('/fashion', [ProductController::class, 'fashionProducts'])->name('fashion');
Route::get('/home-goods', [ProductController::class, 'homeGoods'])->name('home-goods');
