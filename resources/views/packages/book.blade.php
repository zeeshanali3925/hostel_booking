@extends('layouts.app')

@section('title', 'Book Package')

@section('content')
<div class="container mx-auto py-10 px-4 max-w-2xl">
    <h2 class="text-3xl font-bold mb-6">Book: {{ $package['title'] }}</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

  



    <form method="POST" action="{{ route('packages.book.store', $id) }}" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block font-medium mb-1">Your Name</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border-gray-300 rounded px-4 py-2" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Confirm Booking
            </button>
        </div>
    </form>
</div>
@endsection
