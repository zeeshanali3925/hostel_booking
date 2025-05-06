@extends('layouts.app')

@section('title', 'Car Booking')

@section('content')
<div class="container mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Car Booking</h1>

    <a href="{{ route('car-booking') }}"
       class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition-all duration-200 ease-in-out transform hover:scale-105">
         View Available Cars
    </a>
</div>
@endsection
