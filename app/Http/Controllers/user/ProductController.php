<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Reviews;
use App\Models\WishList;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $data = [
      'products' => Product::with('images')->where('status', 1)->paginate(12),
      'categories' => Category::get(),
      'wishlists' => WishList::get()
    ];
    return view('user/product')->with($data);
  }

  public function productDetail($product_name, $product_id)
  {
    try {
      $current_product = Product::with('images')->where('status', 1)->where('name', $product_name)->find($product_id);
      $data = [
        'product' => Product::with('images')->where('status', 1)->where('name', $product_name)->find($product_id),
        'category' => Category::find($current_product->category_id),
        'reviews' => Reviews::with('customerId')->where('product_id', $product_id)->where('is_approved', 1)->get(),
        'wishlists' => WishList::get()
      ];
      // dd(Reviews::with('customerId')->where('product_id', $product_id)->get());
      return view('user/product_detail')->with($data);
    } catch (Exception $ex) {
      return view('errors/404');
    }
  }

  public function sortByDesc()
  {
    $data = [
      'products' => Product::with('images')->where('status', 1)->orderBy('price', 'DESC')->paginate(12),
      'categories' => Category::get(),
      'wishlists' => WishList::get()
    ];
    return view('user/product')->with($data);
  }

  public function sortByAsc()
  {
    $data = [
      'products' => Product::with('images')->where('status', 1)->orderBy('price', 'ASC')->paginate(12),
      'categories' => Category::get(),
      'wishlists' => WishList::get()
    ];
    return view('user/product')->with($data);
  }

  public function search(Request $request)
  {
    $searchQuery = $request->input('search-product');
    $data = [
      'products' => Product::with('images')->where('status', 1)->where('name', 'like', '%' . $searchQuery . '%')->paginate(12),
      'categories' => Category::get(),
      'wishlists' => WishList::get()
    ];
    return view('user/product')->with($data);
  }

  public function addReview(Request $request, $product_id)
  {
    $review = [
      'product_id' => $product_id,
      'customer_id' => auth()->user()->id,
      'rating' => $request->post('rating'),
      'content' => $request->input('review'),
      'is_approved' => 0
    ];
    Reviews::create($review);
    return redirect()->back();
  }

  public function addToWishlist($product_id)
  {
    if (!auth()->check()) {
      return redirect()->route('login');
    }

    if (WishList::where('product_id', $product_id)
      ->where('customer_id', auth()->id())
      ->exists()
    ) {
      return redirect()->back();
    }

    Wishlist::create([
      'product_id' => $product_id,
      'customer_id' => auth()->id()
    ]);
    return redirect()->back();
  }

  public function removeFromWishlist($product_id)
  {
    if (!auth()->check()) {
      return redirect()->route('login');
    }

    $wishlist = Wishlist::where('product_id', $product_id)
      ->where('customer_id', auth()->id())
      ->first();

    if (!$wishlist) {
      return redirect()->back();
    }

    $wishlist->delete();

    return redirect()->back();
  }
}
