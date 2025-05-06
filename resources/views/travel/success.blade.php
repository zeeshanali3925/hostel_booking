@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-4">🎉 Booking Successful!</h1>
    <p class="text-lg">Thank you! Your flight has been booked.</p>
    <a href="{{ route('home') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Go Home</a>
</div>
@endsection
