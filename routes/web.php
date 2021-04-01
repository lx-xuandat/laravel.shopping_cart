<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'getIndex'])->name('product.index');
Route::get('/add-to-cart/{id}', [ProductController::class, 'getAddToCart'])->name('product.addToCart');
Route::get('/shopping-cart', [ProductController::class, 'getCart'])->name('product.cart');
Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('product.checkout');
Route::post('/checkout', [ProductController::class, 'postCheckout'])->name('checkout.post');

Route::prefix('user')->group(function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [UserController::class, 'getSignup'])->name('user.signup');
        Route::post('/signup', [UserController::class, 'postSignup'])->name('user.signup.post');
        Route::post('/signin', [UserController::class, 'postSignin'])->name('user.signin');
        Route::get('/signin', [UserController::class, 'getSignin'])->name('user.signin');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [UserController::class, 'getProfile'])->name('user.profile');
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    });
});
