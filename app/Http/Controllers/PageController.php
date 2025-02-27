<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // 🟢 Show Create Account Page
    public function createAccount()
    {
        return view('auth.Create-New-account');
    }

    // 🔵 Redirect to Sign-In Page After Signup
    public function redirectToSignIn()
    {
        return redirect()->route('sign-in')->with('success', 'Account created successfully! Please sign in.');
    }
}
