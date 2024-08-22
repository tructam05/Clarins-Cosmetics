<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;

class AccountController extends Controller
{
  public function index()
  {
    $data = [
      
    ];
    return view('user/account')->with($data);
  }

  public function editProfile()
  {
    $data = [
      'account' => Customer::where()
    ];
    return view('user/editProfile')->with($data);
  }
}
