<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
  public function index()
  {
    $data = [
      'products' => Product::get()
    ];
    return view('welcome')->with($data);
  }
}
