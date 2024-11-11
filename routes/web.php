<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('products', function () {
//     return view('welcome');
// });



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('permission:view dashboard');

    Route::middleware(['role:employee'])->group(function () {
        Route::get('/orders', [OrderController::class, 'index']);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('customers', CustomerController::class);
        Route::post('cart/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    });

    Route::middleware(['role:manager'])->group(function () {
        Route::get('/manage-products', [ProductController::class, 'index']);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('customers', CustomerController::class);
        Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    });
});


Auth::routes();
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
