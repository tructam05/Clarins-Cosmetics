<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AccountController extends Controller
{
  public function index()
  {

    
    $orders = CustomerOrder::where('customer_id', auth()->user()->id)
    ->with('orderDetails.product.images')
    ->get();

    $data = [
      'customer' => auth()->user(),
      'orders' => $orders
    ];
    // dd($order_detail);
    // dd($orders);
    return view('user/account')->with($data);
  }

  public function editProfile()
  {
    $orders = CustomerOrder::where('customer_id', auth()->user()->id)
    ->with('orderDetails.product.images')
    ->get();

    $data = [
      'customer' => auth()->user(),
      'orders' => $orders
    ];
    // dd($order_detail);
    // dd($orders);
    return view('user/editProfile')->with($data);
  }
}
