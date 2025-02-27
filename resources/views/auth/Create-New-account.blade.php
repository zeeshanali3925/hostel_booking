@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold text-center text-blue-600">Create an Account</h2>

        <form action="{{ route('sign-up') }}" method="POST" class="mt-6 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" class="w-full p-4 border rounded-md mt-2" required>
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" class="w-full p-4 border rounded-md mt-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full p-4 border rounded-md mt-2" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full p-4 border rounded-md mt-2" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md w-full hover:bg-blue-700">Sign Up</button>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("signUpForm").addEventListener("submit", function() {
                    setTimeout(function() {
                        window.location.href = "{{ route('sign-in') }}";
                    }, 100); // 100ms delay for smooth transition
                });
            });
        </script>
        



        <p class="text-center mt-4 text-gray-600">
            Already have an account? <a href="{{ route('sign-in') }}" class="text-blue-600 hover:underline">Sign In</a>
        </p>
    </div>
@endsection
