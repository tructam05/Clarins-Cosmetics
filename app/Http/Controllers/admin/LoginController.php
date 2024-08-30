<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\alert;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function  login()
    {
        return view('login/index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            $user = Auth::user();

            if ($user->role == 1) {
                return redirect()->route('admin');
            } elseif ($user->role == 0) {
                return redirect()->route('user');
            }
        }

        Session::flash('error', 'Email or password incorrect');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
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
            User::create($account);
            return redirect('/home')->with('success', 'Create account successfully!');
        } catch (Exception $ex) {

            alert('Failed!');
            dd($ex);
        }
        return redirect('/create-account')->with('error', 'An error occurred. Please try again later.');
    }


    public function createAccount()
    {
        return view('user/createAccount');
    }
}
