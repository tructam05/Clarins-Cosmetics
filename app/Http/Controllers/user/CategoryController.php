<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\WishList;
use Exception;

class CategoryController extends Controller
{
  public function index($category_name, $category_id)
  {
    try {
      $current_category = Category::where('name', $category_name)->find($category_id);
      $data = [
        'products' => Product::with('images')->where('status', 1)->where('category_id', $category_id)->paginate(12),
        'categories' => Category::get(),
        'current_category' => Category::find($current_category->id),
        'wishlists' => WishList::get()
      ];
      return view('user/category')->with($data);
    } catch (Exception $ex) {
      return view('errors/404');
    }
  }
}
