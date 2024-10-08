<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
  public function index()
  {
    $data = [
      'products' => Product::with('images')->where('status',1)->paginate(12),
      'categories' => Category::get(),
      'famous_product' => Product::with('images')->where('status',1)->find(24),
    ];
    return view('user/home')->with($data);
  }
}
