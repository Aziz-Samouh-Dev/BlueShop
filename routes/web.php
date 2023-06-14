<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/', HomeController::class);
Route::resource('/home', HomeController::class);


Route::get('/product', [HomeController::class, 'products'])->name('pro');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{product}/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::resource('/payment', PaymentController::class)->middleware(['auth', 'verified']);
Route::post('/order', [OrderController::class, 'store'])->name('order.store');



Route::get('/profile', [ProfileController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(['auth', 'verified'])->name('profile.destroy');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('/dashboard', AdminController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/categorys', CategoryController::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
});
Route::resource('/users', UserController::class)->middleware(['auth', 'verified']);

Route::resource('/orders', OrderController::class)->middleware(['auth', 'verified']);

Route::post('/cart/add/{productId}', 'CartController@addToCart')->name('cart.add');

require __DIR__ . '/auth.php';
