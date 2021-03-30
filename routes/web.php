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
Route::get('/signup', [UserController::class, 'getSignup'])->name('user.signup');
Route::post('/signup', [UserController::class, 'postSignup'])->name('user.signup.post');
