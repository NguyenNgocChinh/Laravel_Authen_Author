<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show(){
        return view('Auth.login');
    }
    public function login(Request  $request){

        $request->validate([
            'username' => 'required:Username or Email is not empty',
            'password' => 'required:Password is not empty',
        ]);

        $username = $request->username;
        $password = $request->password;

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL))
            Auth::attempt(['email' => $username, 'password' => $password]);
        else
            Auth::attempt(['username' => $username, 'password' => $password]);
        if (Auth::check()) {
            $request->session()->regenerate();

            return redirect()->intended('/product');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
