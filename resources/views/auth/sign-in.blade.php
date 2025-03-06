@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold text-center text-blue-600">Sign In</h2>
        
        <form action="{{ route('log-in') }}" method="POST" class="mt-6 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full p-4 border rounded-md mt-2" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full p-4 border rounded-md mt-2" required>
            </div>
         
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md w-full hover:bg-blue-700">Sign In</button>
        
            <a href="{{ route('create-new-account') }}" class="block text-center mt-4 text-blue-600 hover:text-blue-800">create new account</a>

        </form>
    </div>
@endsection