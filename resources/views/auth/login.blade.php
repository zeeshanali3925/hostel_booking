@extends('layouts.app')

@section('title', 'Expedia Sign In')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
        <header>
            <a href="{{ url('/') }}" class="text-3xl font-bold text-blue-600">Expedia</a>
        </header>

        <h1 class="text-2xl font-bold text-gray-800 mt-4">Sign in or create an account</h1>
        <p class="text-gray-600 text-sm mt-2">Unlock a world of rewards with one account across Expedia, Hotels.com, and Vrbo.</p>

        <button class="flex items-center justify-center w-full bg-blue-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-700 transition">
            <img src="{{ asset('images/google-icon.svg') }}" class="w-5 mr-2"> Sign in with Google
        </button>

        <div class="text-gray-500 my-4">or</div>

        <form action="{{ route('email-login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <button type="submit"
                class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-700 transition">
                Continue
            </button>
        </form>

        <p class="text-gray-600 mt-4">Other ways to sign in</p>

        <div class="flex justify-center mt-2 space-x-4">
            <a href="#" class="w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full">
                <img src="https://a.travel-assets.com/egds/marks/apple.svg" class="w-5">
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full">
                <img src="https://a.travel-assets.com/egds/marks/facebook.svg" class="w-5">
            </a>
        </div>

        <footer class="mt-6 text-gray-500 text-sm">
            <p>By continuing, you agree to our <a href="#" class="text-blue-600 hover:underline">Terms and Conditions</a>.</p>
        </footer>
    </div>
</div>
@endsection