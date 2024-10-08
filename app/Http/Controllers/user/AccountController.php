<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  public function index()
  {


    $orders = CustomerOrder::where('customer_id', auth()->user()->id)
      ->with('orderDetails.product.images')->orderBy('created_at', 'DESC')
      ->get();

    $data = [
      'customer' => auth()->user(),
      'orders' => $orders
    ];
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
      'email' => 'email',
      'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $user = User::find($id);
    $user->name = $request->post('name');

    if ($request->hasFile('avatar')) {
      $avatarName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
      $request->file('avatar')->move(public_path('user\images'), $avatarName);
      $user->avatar = $avatarName;
    }

    $user->age = $request->post('age');
    $user->phone = $request->post('phone');
    $user->email = $request->post('email');
    $user->address = $request->post('address');
    $user->save();
    return redirect('/account');
  }
}
