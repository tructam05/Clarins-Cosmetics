<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AccountController extends Controller
{
  public function index()
  {
    $products = DB::table('product')
    ->join('product_image', 'product.id', '=', 'product_image.product_id')
    ->join('order_detail', 'product.id', '=', 'order_detail.product_id')
    ->join('customer_order', 'order_detail.order_id', '=', 'customer_order.id')
    ->join('users', 'customer_order.customer_id', '=', 'users.id')
    ->select('product.name', 'product.price', 'product_image.path', 'users.name as customer_name')
    ->get();
    $data = [
      'customer' => auth()->user(),
      'products' => $products
    ];
    // dd($products);
    return view('user/account')->with($data);
  }

  public function editProfile()
  {
    $data = [
      'account' => User::where()
    ];
    return view('user/editProfile')->with($data);
  }
}
