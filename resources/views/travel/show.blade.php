<!-- resources/views/stay/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-center text-indigo-800 mb-10">{{ $stay->title }}</h1>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="relative">
            <img src="{{ $stay->image }}" alt="{{ $stay->title }}" class="w-full h-80 object-cover" loading="lazy">
        </div>

        <div class="p-5 space-y-6">
            <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm">{{ $stay->location }}</p>
                <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full">{{ $stay->badge }}</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-green-600 font-bold text-2xl">${{ $stay->price }}/night</span>
                <div class="flex items-center text-yellow-400 text-base">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($stay->rating >= $i)
                            <span>★</span>
                        @elseif ($stay->rating >= $i - 0.5)
                            <span>☆</span>
                        @else
                            <span class="text-gray-300">★</span>
                        @endif
                    @endfor
                    <span class="ml-2 text-sm text-gray-500">{{ number_format($stay->rating, 1) }}/5</span>
                </div>
            </div>

            <p class="text-lg text-gray-800">{{ $stay->description ?? 'No description available.' }}</p>

            <!-- Extra Information Start -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                <div>
                    <h3 class="text-indigo-700 font-semibold mb-2">Amenities</h3>
                    <ul class="list-disc list-inside text-gray-600 text-sm space-y-1">
                        <li>Free Wi-Fi</li>
                        <li>Breakfast included</li>
                        <li>Private Pool</li>
                        <li>24/7 Support</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-indigo-700 font-semibold mb-2">Stay Type</h3>
                    <p class="text-gray-600 text-sm">Luxury Suite</p>
                </div>

                <div>
                    <h3 class="text-indigo-700 font-semibold mb-2">Cancellation Policy</h3>
                    <p class="text-gray-600 text-sm">Free cancellation up to 48 hours before check-in.</p>
                </div>

                <div>
                    <h3 class="text-indigo-700 font-semibold mb-2">Special Features</h3>
                    <p class="text-gray-600 text-sm">Beachfront | Pet Friendly | Family Rooms</p>
                </div>
            </div>
            <!-- Extra Information End -->

            <div class="flex justify-between items-center mt-10">
                <a href="{{ route('stays.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm underline">&larr; Back to all stays</a>

                <a href="{{ route('stay.book', ['id' => $stay->id]) }}" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition text-sm">Book This Stay</a>
            </div>

        </div>
    </div>
</div>
@endsection
