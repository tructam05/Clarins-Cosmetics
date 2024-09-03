<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
            $newAccount = new User;
            $newAccount->name = $request->post('name');
            $newAccount->avatar = 'banner-02.jpg';
            $newAccount->age = $request->post('age');
            $newAccount->phone = $request->post('phone');
            $newAccount->email = $request->post('email');
            $newAccount->password = Hash::make($request->post('password'));
            $newAccount->remember_token = '';
            $newAccount->address = $request->post('address');
            $newAccount->save();
         
            
            $newCart = new Cart;
            $newCart->customer_id = $newAccount->id;
            $newCart->save();
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
