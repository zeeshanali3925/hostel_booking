<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 🟢 Sign Up Form Show Karne Ka Method
    public function showSignUpForm()
    {
        return view('auth.sign-in');
    }

    // 🔵 Sign Up (Register) Karne Ka Method
    public function signUp(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
        ]);

        // Naya User Create Karna
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('sign-in');
        } else {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    // 🟠 Sign In Form Show Karne Ka Method
    public function showSignInForm()
    {
        return view('auth.sign-in');
    }

    // 🔴 Sign In (Login) Karne Ka Method
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // ⚫ Logout Ka Method
    public function logout()
    {
        Auth::logout();
        return redirect()->route('sign-in')->with('success', 'You have been logged out.');
    }

    public function showEmailLogin()
    {
        return view('auth.login');
    }

    public function emailLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // User ko database se find karein
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user); // User ko login kar dein
<<<<<<< HEAD
            return redirect()->route('welcome')->with('success', 'Login successful');
=======
            return redirect()->route('home')->with('success', 'Login successful');
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
        }

        return back()->withErrors(['email' => 'Email not found.'])->withInput();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
