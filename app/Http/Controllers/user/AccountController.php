<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
    return view('user/editProfile')->with($data);
  }

  public function saveChanges(Request $request)
  {
    $id = $request->post('id');
    $request->validate([
      'name' => 'required|string|max:255',
      'age' => 'required|integer|min:18',
      'email' => 'required|email|unique:users,email,' . $id,
      'phone' => 'required|numeric',
      'address' => 'required',
      'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $user = User::findOrFail($id);

    if ($request->hasFile('avatar')) {
      $avatarPath = 'user/images/' . time() . '.' . $request->avatar->extension();
      $request->avatar->move(public_path('user/images'), $avatarPath);
      $user->avatar = $avatarPath;
    }

    $user->update($request->all());

    return redirect('/account')->with('success', 'Cập nhật thông tin thành công.');
  }
}
