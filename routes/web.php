<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.admin');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Shop Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{id_kategori?}', [ShopController::class, 'showShop'])->name('shop.category');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::prefix('admin')->name('admin.')->group(function () {
    // Definisikan resource route dengan prefix admin
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});

