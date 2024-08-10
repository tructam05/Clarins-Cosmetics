<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
  public function index()
  {
    return view('user/about');
  }
}
