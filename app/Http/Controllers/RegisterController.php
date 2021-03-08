<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('Auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required:Username is not empty|unique:users,username',
            'password' => 'required:Password is not empty|confirmed:password_confirmation',
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);
        $request->offsetSet('password',  ($request->password));
        $result = User::create($request->all());
        if ($request){
            return redirect()->route('login');
        }
        else{
            return back()->withErrors([
                'error' => 'ERROR',
            ]);
        }

    }
}
