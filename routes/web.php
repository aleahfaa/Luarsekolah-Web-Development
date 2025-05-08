<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cleaning-products', function () {
    return view('cleaning-products');
})->name('cleaning-products');

Route::get('/fashion', function () {
    return view('fashion');
})->name('fashion');

Route::get('/home-goods', function () {
    return view('home-goods');
})->name('home-goods');

Route::get('/cleaning-products', [ProductController::class, 'cleaningProducts'])
    ->name('cleaning.products');

Route::get('/fashion', [ProductController::class, 'fashionProducts'])
    ->name('fashion.products');

Route::get('/home-goods', [ProductController::class, 'homeGoods'])
    ->name('homegoods.products');

Route::post('/contact', [MessageController::class, 'store']);

// Cart Routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource("/products", ProductController::class);
});

require __DIR__."/auth.php";
