@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-center text-blue-800 mb-10">Explore Top Cruises</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Cruise Card -->
        @foreach ([
            [
                'title' => 'Caribbean Dream Cruise',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e',
                'desc' => '7 nights luxury cruise with ocean views, fine dining, and fun activities.',
                'price' => 799,
                'rating' => 4.5,
                'badge' => 'Popular'
            ],
            [
                'title' => 'Mediterranean Explorer',
                'image' => 'https://images.unsplash.com/photo-1533777857889-4be7c70b33f7',
                'desc' => 'Explore Europe via sea with historic cities and breathtaking coastlines.',
                'price' => 999,
                'rating' => 4.8,
                'badge' => 'New'
            ],
            [
                'title' => 'Alaskan Adventure',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSara6Xi8YA5sP4JMoh3dTWIUlvSCKOW7hHVw&s',
                'desc' => 'Enjoy nature, glaciers, and wildlife in this 5-night Alaskan cruise trip.',
                'price' => 699,
                'rating' => 4.6,
                'badge' => 'Top Rated'
            ]
        ] as $cruise)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition hover:scale-105">
            <div class="relative">
                <img src="{{ $cruise['image'] }}" alt="{{ $cruise['title'] }}" class="w-full h-52 object-cover">
                <span class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded-full shadow">{{ $cruise['badge'] }}</span>
            </div>
            <div class="p-5">
                <h2 class="text-xl font-semibold mb-1 text-gray-800">{{ $cruise['title'] }}</h2>
                <p class="text-sm text-gray-600 mb-2">{{ $cruise['desc'] }}</p>

                <div class="flex items-center justify-between mb-3">
                    <span class="text-green-600 font-bold text-lg">${{ $cruise['price'] }}</span>
                    <div class="flex items-center text-yellow-500">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($cruise['rating'] >= $i)
                                ★
                            @elseif ($cruise['rating'] >= $i - 0.5)
                                ☆
                            @else
                                <span class="text-gray-300">★</span>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex justify-between">
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm">View Details</a>
                    <a href="#" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
