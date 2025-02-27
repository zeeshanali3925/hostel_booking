<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    
    // Show Sign Up Form
    public function showSignUpForm() {
        return view('sign-up'); // Yeh view folder me 'sign-up.blade.php' hona chahiye
    }

    // Register New User
    public function register(Request $request) {
        // Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // User Create
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password ko hash karna zaroori hai
        ]);

        // Auto-login after registration
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    // Show Login Form
    public function showSignInForm() {
        return view('sign-in'); // Yeh view folder me 'sign-in.blade.php' hona chahiye
    }

    // User Login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // User Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('sign-in')->with('success', 'You have been logged out.');
    }
}
