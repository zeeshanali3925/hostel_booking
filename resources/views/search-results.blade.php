@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold">Search Results</h2>
        <p>Destination: {{ $destination }}</p>
        <p>Check-in: {{ $checkIn }}</p>
        <p>Check-out: {{ $checkOut }}</p>
        <p>Guests: {{ $guests }}</p>

        <div class="mt-6">
            <p>Showing search results for your selected criteria...</p>

            
        </div>
    </div>
@endsection