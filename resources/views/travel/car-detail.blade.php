@extends('layouts.app')
@section('content')
<div class="bg-white rounded shadow p-6">
    <img src="{{ asset('storage/' . $car->image) }}" class="w-full h-60 object-cover mb-4" />
    <h1 class="text-2xl font-bold">{{ $car->name }}</h1>
    <p class="text-gray-700">{{ $car->description }}</p>
    <p class="mt-2">Brand: {{ $car->brand }}</p>
    <p>Seats: {{ $car->seats }}</p>
    <p class="text-green-600 font-bold mt-2">PKR {{ $car->price_per_day }}/day</p>

    <form action="{{ route('car.book', $car->id) }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Book This Car
        </button>
    </form>
</div>
@endsection
