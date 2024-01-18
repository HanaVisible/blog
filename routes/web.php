<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('blog', 'App\Http\Controllers\BlogController');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', 'App\Http\Controllers\ProductController');

Auth::routes();

Route::controller(App\Http\Controllers\StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::get('auth/facebook', [App\Http\Controllers\SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [App\Http\Controllers\SocialController::class, 'loginWithFacebook']);

use App\Http\Controllers\WhatappController;

Route::get('/send-whatsapp', [WhatappController::class, 'sendWhatsAppMessage']);
