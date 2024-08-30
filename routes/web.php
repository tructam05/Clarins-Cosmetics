<?php

use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\AccountController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\WishListController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::group(['prefix' => ''], function () {
    Route::get('/',[HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/about-us', [AboutController::class, 'index']);
    Route::get('/account', [AccountController::class, 'index'])->middleware('auth');
    Route::get('/account/edit-profile', [AccountController::class, 'editProfile']);
    Route::post('/update-info', [AccountController::class, 'saveChanges']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact/submit', [ContactController::class, 'submit']);
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/sort-high-to-low', [ProductController::class, 'sortByDesc']);
    Route::get('/product/sort-low-to-high', [ProductController::class, 'sortByAsc']);
    Route::get('/product/search', [ProductController::class, 'search']);
    Route::post('/add-review/{product_id}', [ProductController::class, 'addReview']);
    Route::get('/category/{category_name}/{category_id}', [CategoryController::class, 'index']);
    Route::get('/product/{product_name}/{product_id}', [ProductController::class, 'productDetail']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/new-account', [LoginController::class, 'signUp']);
    Route::get('/create-account', [LoginController::class, 'createAccount']);

    Route::get('/wishlist', [WishListController::class, 'index'])->middleware('auth');
    Route::get('/add-to-wishlist/{product_id}', [ProductController::class, 'addToWishlist'])->middleware('auth');
    Route::get('/remove-from-wishlist/{product_id}', [ProductController::class, 'removeFromWishlist'])->middleware('auth');

    Route::get('/cart', [CartController::class, 'index'])->middleware('auth');


});