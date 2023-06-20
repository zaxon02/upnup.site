<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaykeeperController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::redirect('/', '/posts');

Route::view('/contact', 'contact')->name('contact');

Route::view('/about', 'about')->name('about');

Route::view('/payment', 'payment')->middleware('auth')->name('payment');

Route::get('/paykeeper', PaykeeperController::class)->name('paykeeper');

Route::resource('categories', CategoryController::class);

Route::resource('posts', PostController::class);

Route::resource('offers', OfferController::class);
