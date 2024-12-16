<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;

// Auth Routes
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/editprofile', [ProfileController::class, 'edit'])->name('editprofile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('update');
});

// Home and Shop Routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{id_produk}', [ShopController::class, 'showSingle'])->name('shop.single');
Route::get('/shop/category/{id_kategori?}', [ShopController::class, 'showShop'])->name('shop.category');

// // Cart Routes
// Route::middleware('auth')->group(function () {
//     Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//     Route::get('/cart/add/{id_produk}', [CartController::class, 'add'])->name('cart.add');
// });

//Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'process'])->middleware('auth')->name("checkout-process");
Route::get('/checkout/{transaction}', [CheckoutController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::get('/checkout/success/{transaction}', [CheckoutController::class, 'success'])->name("checkout-success");
Route::get('/transaction', [TransactionController::class, 'index'])->name("transaction");

// Admin Routes (Admin Middleware)
Route::middleware(['auth', 'RoleMiddleware:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
});

// Customer Routes (Customer Middleware)
Route::middleware(['auth', 'RoleMiddleware:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
});

// Additional Admin Route Example for Dashboard
Route::middleware(['auth', 'RoleMiddleware:admin'])->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

// Rute untuk admin
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Tambahkan rute admin lainnya
});

// Rute untuk customer
Route::middleware(['auth', 'checkRole:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    // Tambahkan rute customer lainnya
});
