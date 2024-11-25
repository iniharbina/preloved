<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin.admin');

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Shop Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
// Product Routes
// Route::resource('product', ProductController::class);
// Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Route::put('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::prefix('admin')->name('admin.')->group(function () {
    // Definisikan resource route dengan prefix admin
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});

