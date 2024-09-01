<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\CustomerOrder;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\WishList;
use Exception;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class CartController extends Controller
{
  public function index()
  {
    $data = [
      'cart' => Cart::where('customer_id', auth()->user()->id)->with('cartDetails.product.images')->get()
    ];
    // dd(Cart::where('customer_id',auth()->user()->id)->with('cartDetails.product.images')->get());
    return view('user/cart')->with($data);
  }

  public function checkout(Request $request)
  {
    try {
      $cartItems = Cart::where('customer_id', auth()->user()->id)
        ->with('cartDetails')
        ->first();
      $uniqueCartDetails = $cartItems->cartDetails->unique('product_id');

      $customer_order = new CustomerOrder;
      $customer_order->customer_id = auth()->user()->id;
      $customer_order->payment = $request->post('payment');
      $customer_order->status = 1;
      $customer_order->save();

      foreach ($uniqueCartDetails as $cartDetail) {
        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $customer_order->id;
        $orderDetail->product_id = $cartDetail->product_id;
        $orderDetail->quantity = $cartDetail->quantity;
        $orderDetail->price = ($cartDetail->total) / ($cartDetail->quantity);
        $orderDetail->total = $cartDetail->total;
        $orderDetail->save();
      }
      $cartItems->cartDetails()->delete();
      return redirect()->back();
    } catch (Exception $ex) {
      return view('errors/404');
    }
  }

  public function addToCart(Request $request)
  {
    try {
      if (!Cart::where('customer_id', auth()->user()->id)->exists()) {
        $new_cart = new Cart;
        $new_cart->customer_id = auth()->user()->id;
        $new_cart->save();
      }
      $currentCart = Cart::where('customer_id', auth()->user()->id)->first();
      $new_cart_item = new CartDetail;
      $new_cart_item->cart_id = $currentCart->id;
      $new_cart_item->product_id = $request->post('product_id');
      $new_cart_item->quantity = $request->post('num-product');
      $new_cart_item->total = (Product::where('id', $request->post('product_id'))->first()->price) * intval($request->post('num-product'));
      $new_cart_item->save();
      return redirect()->back();
    } catch (Exception $ex) {
      return view('errors/404');
    }
  }
  public function removeFromCart($cartItem_id)
  {
    try {
      $currentCartItem = CartDetail::find($cartItem_id);
      $currentCartItem->delete();

      return redirect()->back();
    } catch (Exception $ex) {
      return view('errors/404');
    }
  }
}
