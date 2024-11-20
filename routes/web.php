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

// Category Routes
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index'); // Menampilkan semua kategori
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create'); // Form untuk kategori baru
    Route::post('/', [CategoryController::class, 'store'])->name('category.store'); // Simpan kategori baru
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit'); // Edit kategori
    Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update'); // Update kategori

    // Subcategories
    Route::get('/male', [CategoryController::class, 'showMaleCategory'])->name('category.male'); // Kategori pria
    Route::get('/female', [CategoryController::class, 'showFemaleCategory'])->name('category.female'); // Kategori wanita
});

// Product Routes
// Route::resource('product', ProductController::class);
// Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Route::put('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::prefix('admin')->name('admin.')->group(function () {
    // Definisikan resource route dengan prefix admin
    Route::resource('product', ProductController::class);
});

