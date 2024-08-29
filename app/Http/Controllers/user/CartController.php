<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\WishList;

class CartController extends Controller
{
  public function index()
  {
    $data = [
      'wishlists' => WishList::where('customer_id',auth()->user()->id)->with('productId.images')->paginate(12)
    ];
    // dd(WishList::where('customer_id', auth()->user()->id)->with('productId.images')->paginate(12));
    return view('user/cart')->with($data);
  }
}
