<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => ''], function () {
    Route::get('/',[HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/about-us', [AboutController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/product', [ProductController::class, 'index']);
});