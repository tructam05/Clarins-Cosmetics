<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $data = [
      'products' => Product::with('images')->paginate(12),
      'categories' => Category::get(),
    ];
    return view('user/product')->with($data);
  }

  public function product_detail($product_name,$product_id)
  {
    $current_product = Product::with('images')->find($product_id);
    $data = [
      'product' => Product::with('images')->find($product_id),
      'category' => Category::find($current_product->category_id),
      'reviews' => Reviews::with('customerId')->where('product_id',$product_id)->where('is_approved',1)->get()
    ];
    // dd(Reviews::with('customerId')->where('product_id', $product_id)->get());
    return view('user/product_detail')->with($data);
  }

  public function sortByDesc()
  {
    $data = [
      'products' => Product::with('images')->orderBy('price','DESC')->paginate(12),
      'categories' => Category::get(),
    ];
    return view('user/product')->with($data);
  }

  public function sortByAsc()
  {
    $data = [
      'products' => Product::with('images')->orderBy('price', 'ASC')->paginate(12),
      'categories' => Category::get(),
    ];
    return view('user/product')->with($data);
  }

  public function search(Request $request)
  {
    $searchQuery = $request->input('search-product');
    $data = [
      'products' => Product::with('images')->where('name', 'like', '%' . $searchQuery . '%')->paginate(12),
      'categories' => Category::get(),
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
}
