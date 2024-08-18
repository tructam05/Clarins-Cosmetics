<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;


class CategoryController extends Controller
{
  public function index($category_name,$category_id)
  {
    $data = [
      'products' => Product::with('images')->where('category_id', $category_id)->paginate(12),
      'categories' => Category::get()
    ];
    return view('user/category')->with($data);
  }
}
