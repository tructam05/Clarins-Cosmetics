<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\WishList;

class CategoryController extends Controller
{
  public function index($category_name,$category_id)
  {
    $data = [
      'products' => Product::with('images')->where('status', 1)->where('category_id', $category_id)->paginate(12),
      'categories' => Category::get(),
      'current_category' => Category::find($category_id),
      'wishlists' => WishList::get()
    ];
    return view('user/category')->with($data);
  }
}
