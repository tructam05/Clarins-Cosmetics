<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class LayoutController extends Controller
{



    public function  admin()
    {
        return view('layout/admin');
    }
}
