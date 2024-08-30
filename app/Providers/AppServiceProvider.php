<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $data = [
            'categories' => Category::get(),
            'products' => Product::with('images')->paginate(12),
            'all_products' => Product::get(),
            // 'customer' => auth()->user(),
            'wishlists' => WishList::get()
        ];

        View::share('sharedData', $data);
    }
}
