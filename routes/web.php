<?php

use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\AccountController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::group(['prefix' => ''], function () {
    Route::get('/',[HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/about-us', [AboutController::class, 'index']);
    Route::get('/account', [AccountController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact/submit', [ContactController::class, 'submit']);
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/category/{category_name}/{category_id}', [CategoryController::class, 'index']);
    Route::get('/product/{product_name}/{product_id}', [ProductController::class, 'product_detail']);
});