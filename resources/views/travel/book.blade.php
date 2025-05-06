@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-center text-indigo-800 mb-10">Book Your Stay</h1>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <img src="{{ $stay->image }}" alt="{{ $stay->title }}" class="w-full h-52 object-cover" loading="lazy">
        <div class="p-5">
            <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $stay->title }}</h2>
            <p class="text-gray-500 text-sm mb-2">{{ $stay->location }}</p>
            <p class="text-green-600 font-bold text-lg">${{ $stay->price }}/night</p>

            <!-- Booking Form (you can extend it to include form fields) -->
            <form action="{{ route('stay.confirm', ['id' => $stay->id]) }}" method="GET">
                @csrf
                <!-- Add any other fields as necessary -->
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
