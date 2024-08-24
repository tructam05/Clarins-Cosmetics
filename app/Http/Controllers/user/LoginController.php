<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{


  public function index()
  {
    return view('user/login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {

      return redirect()->intended('/account');
    }
    return back()->withErrors([
      'email' => 'Email or password incorrect',
    ]);
  }

  public function signUp(Request $request)
  {
    try {
      $account = [
        'name' => $request->post('name'),
        'avatar' => 'banner-02.jpg',
        'age' => $request->post('age'),
        'phone' => $request->post('phone'),
        'email' => $request->post('email'),
        'password' => Hash::make($request->post('password')),
        'remember_token' => '',
        'address' => $request->post('address'),
      ];
      $customer = Customer::create($account);
      return redirect('/home')->with('success', 'Create account successfully!');
    } catch (Exception $ex) {

      alert('Failed');
    }
    return redirect('/create-account')->with('error', 'An error occurred. Please try again later.');
  }


  public function createAccount()
  {
    return view('user/createAccount');
  }

  public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
