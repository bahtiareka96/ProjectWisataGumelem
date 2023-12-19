<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // Your custom login logic here

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed
        if(Auth::user()->roles=='ADMIN'){
            $redirectTo =  '/admin';

        }else{
            $redirectTo = '/';
        }

        // You can dynamically set $redirectTo based on your conditions

        return redirect()->intended($redirectTo);
    }

    // Authentication failed
    return back()->withErrors(['email' => 'Invalid credentials']);
}
}
