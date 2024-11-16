<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/category/male', [CategoryController::class, 'showMaleCategory'])->name('category.male');
Route::get('/category/female', [CategoryController::class, 'showFemaleCategory'])->name('category.female');

Route::resource('product', ProductController::class);
