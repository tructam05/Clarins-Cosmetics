<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\WishList;

class WishListController extends Controller
{
  public function index()
  {
    $data = [
      'wishlists' => WishList::where('customer_id',auth()->user()->id)->with('productId.images')->paginate(12)
    ];
    return view('user/wishlist')->with($data);
  }
}
