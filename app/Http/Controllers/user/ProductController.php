<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
  public function index()
  {
    $data = [
      'products' => Product::with('images')->paginate(12),
      'categories' => Category::get()
    ];
    return view('user/product')->with($data);
  }
  public function product_detail($product_id)
  {
    $data = [
      'product' => Product::with('images')->find($product_id),
      'categories' => Category::get()
    ];
    return view('user/product_detail')->with($data);
  }
}
