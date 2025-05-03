<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/cleaning-products', [ProductController::class, 'cleaningProducts']);
Route::get('/fashion', [ProductController::class, 'fashionProducts']);
Route::get('/home-goods', [ProductController::class, 'homeGoods']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // product crud

    Route::resource("/products", ProductController::class);
});


require __DIR__."/auth.php";
