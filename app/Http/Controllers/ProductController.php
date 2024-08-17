<?php

namespace App\Http\Controllers;

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
}
