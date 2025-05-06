<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // ✅ User Create کریں اور DB میں Save کریں
        User::create([
            'name' => request('first_name') . ' ' . request('last_name'), // ✅ Name کو generate کریں
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        
        // ✅ Redirect to Sign In Page
        return redirect()->route('sign-in')->with('success', 'Account created successfully! Please sign in.');
    }
}
