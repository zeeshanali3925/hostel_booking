@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<div class="bg-cover bg-center h-64 relative" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center">
        <h1 class="text-white text-4xl font-bold mb-2">Things to Do</h1>
        <p class="text-gray-200 text-lg">Explore unforgettable experiences wherever you go</p>
    </div>
</div>

<!-- Search & Filters -->
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
        <input type="text" placeholder="Search activities..." class="w-full sm:w-2/3 border border-gray-300 rounded-lg px-4 py-2 shadow focus:outline-none focus:ring-2 focus:ring-blue-500" />
        
        <div class="flex flex-wrap gap-2">
            @foreach(['All', 'Adventure', 'Culture', 'Nature', 'Top Rated'] as $filter)
            <button class="px-4 py-1 text-sm bg-gray-100 rounded-full hover:bg-blue-600 hover:text-white transition">{{ $filter }}</button>
            @endforeach
        </div>
    </div>

    <!-- Activity Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ([
            [
                'title' => 'Desert Safari in Dubai',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR26grfjHFM3dh3dk1kSMZVFPYWc4A44A8kGw&s',
                'location' => 'Dubai, UAE',
                'price' => 75,
                'rating' => 4.9,
                'duration' => '6 hours',
                'tag' => 'Adventure',
            ],
            [
                'title' => 'Rome Colosseum Guided Tour',
                'image' => 'https://images.unsplash.com/photo-1548013146-72479768bada',
                'location' => 'Rome, Italy',
                'price' => 50,
                'rating' => 4.8,
                'duration' => '2 hours',
                'tag' => 'Culture',
            ],
            [
                'title' => 'Bali Waterfall Trek',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRLuS55KQHADQmqJFMCml3o3w8MbtYIxHYyQ&s',
                'location' => 'Bali, Indonesia',
                'price' => 60,
                'rating' => 4.7,
                'duration' => 'Half Day',
                'tag' => 'Nature',
            ]
        ] as $activity)
        <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-transform transform hover:scale-105 group">
            <!-- Featured Badge -->
            <div class="absolute top-2 left-2 bg-yellow-500 text-white text-xs px-3 py-1 rounded-full shadow-lg z-10">Featured</div>

            <!-- Image -->
            <div class="overflow-hidden">
                <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
            </div>

            <!-- Content -->
            <div class="p-5">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $activity['title'] }}</h2>
                    <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">{{ $activity['tag'] }}</span>
                </div>
                <p class="text-sm text-gray-500 mb-1">{{ $activity['location'] }} &middot; <span class="italic">{{ $activity['duration'] }}</span></p>

                <!-- Price & Rating -->
                <div class="flex items-center justify-between mt-3 mb-4">
                    <span class="text-green-600 font-bold text-lg">${{ $activity['price'] }}</span>
                    <div class="text-yellow-500 text-sm">
                        @php $stars = floor($activity['rating']); @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if($i <= $stars)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                        <span class="text-gray-500 text-xs ml-1">({{ $activity['rating'] }})</span>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between">
                    <a href="#" class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition">View Details</a>
                    <a href="#" class="bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
