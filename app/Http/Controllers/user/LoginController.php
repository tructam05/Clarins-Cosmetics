<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class LoginController extends Controller
{


  public function index()
  {
    return view('user/login');
  }

  public function login()
  {
    $data = [];
    return view('user/login')->with($data);
  }

  public function signUp()
  {
    $data = [];
    return view('user/createAccount')->with($data);
  }

  public function createAccount()
  {
    return view('user/createAccount');
  }
}
