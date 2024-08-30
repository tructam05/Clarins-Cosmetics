<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Đăng nhập thành công
            return redirect()->intended(route('clarins.index'));
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }
}
?>