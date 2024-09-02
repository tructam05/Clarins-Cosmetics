<?php

use App\Http\Controllers\admin\CategoryAdminController;
use App\Http\Controllers\admin\ChartController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\LayoutController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PersonalPageController;
use App\Http\Controllers\admin\ProductAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\AccountController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\WishListController;


//User Route

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('user');
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
    Route::post('/add-review/{product_id}', [ProductController::class, 'addReview'])->middleware('auth');
    Route::get('/category/{category_name}/{category_id}', [CategoryController::class, 'index']);
    Route::get('/product/{product_name}/{product_id}', [ProductController::class, 'productDetail']);

    // Route::post('/login/submit', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/new-account', [LoginController::class, 'signUp']);
    Route::get('/create-account', [LoginController::class, 'createAccount']);

    Route::get('/wishlist', [WishListController::class, 'index'])->middleware('auth');
    Route::get('/add-to-wishlist/{product_id}', [ProductController::class, 'addToWishlist'])->middleware('auth');
    Route::get('/remove-from-wishlist/{product_id}', [ProductController::class, 'removeFromWishlist'])->middleware('auth');

    Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
    Route::get('/remove-from-cart/{cartItem_id}', [CartController::class, 'removeFromCart'])->middleware('auth');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->middleware('auth');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->middleware('auth');
});

//Admin Route

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/store', [LoginController::class, 'store']);
});


Route::group(['prefix' => 'clarins','middleware' => ['CheckRole']], function () {

    // admin template interface
    Route::get('/', [CategoryAdminController::class, 'index']);
    Route::get('/admin', [LayoutController::class, 'admin']);

    Route::get('chart', [ChartController::class, 'index']);

    Route::group(['prefix' => 'category'], function () {
        // Show multiple categories
        Route::get('/', [CategoryAdminController::class, 'index']);
        Route::get('/index', [CategoryAdminController::class, 'index'])->name('admin');

        // Add category
        Route::get('/add', [CategoryAdminController::class, 'add']);
        Route::post('/save', [CategoryAdminController::class, 'save']);

        //Delete Category
        Route::get('/delete/{id}', [CategoryAdminController::class, 'delete']);

        // Edit category information 
        Route::get('/edit/{id}', [CategoryAdminController::class, 'edit']);
        Route::post('/update', [CategoryAdminController::class, 'update']);
    });


    Route::group(['prefix' => 'product'], function () {
        // show list of products 
        Route::get('/', [ProductAdminController::class, 'index']);
        // Route::get('/index',[ProductController::class, 'index']) ;
        Route::get('/index', [ProductAdminController::class, 'index']);
        Route::get('/show/{id}', [ProductAdminController::class, 'show']);

        // Add products
        Route::get('/add', [ProductAdminController::class, 'add']);
        Route::post('/save', [ProductAdminController::class, 'save']);

        //Delete products
        Route::get('/delete/{id}', [ProductAdminController::class, 'delete']);

        // Edit category products 
        Route::get('/edit/{id}', [ProductAdminController::class, 'edit']);
        Route::post('/update', [ProductAdminController::class, 'update']);
        Route::get('/delete-image/{image_id}', [ProductAdminController::class, 'deleteImage']);

        //Product Details
        Route::resource('products', ProductAdminController::class);

        Route::get('/low-stock', [ProductAdminController::class, 'lowStockProducts']);
    });

    Route::group(['prefix' => 'contact'], function () {
        // show list of products 

        Route::get('/', [ContactUsController::class, 'index'])->name('contact.index');
        Route::get('/{contact}', [ContactUsController::class, 'show'])->name('contact.show');

        // Delete customer feedback 


    });


    Route::group(['prefix' => 'personalpage'], function () {
        Route::get('/', [PersonalPageController::class, 'index']);
        Route::get('/index', [PersonalPageController::class, 'index']);
    });;
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::put('/{review}', [FeedbackController::class, 'approve'])->name('feedback.approve');
        Route::delete('/{review}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
    });
});
