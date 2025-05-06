@extends('layouts.app')

@section('title', 'All Travel Packages')

@section('content')
    {{-- Hero Section --}}
    <div class="relative text-white py-24 px-6 text-center">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-black/30 opacity-80"></div>
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtB3Z_Ih6PRP-mAVU9hbh5POicOXDklvm3Kg&s');">
        </div>
        <div class="relative z-10">
            <h1 class="text-5xl font-extrabold mb-4">All Travel Packages</h1>
            <p class="text-lg max-w-2xl mx-auto mb-6">
                Browse our exclusive deals to find your next dream destination.
            </p>
        </div>
    </div>

    {{-- Packages Grid --}}
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Available Packages</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($packages as $package)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-1 transition duration-300">
                    <div class="relative">
                        <img src="{{ $package->image }}" alt="{{ $package->title }}" class="h-56 w-full object-cover">
                        <span class="absolute top-4 left-4 bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Limited Offer</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $package->title }}</h3>
                        <div class="flex items-center mb-2">
                            <span class="text-blue-600 font-bold text-lg">{{ $package->price }}</span>
                            <div class="ml-auto text-yellow-400 text-sm">★★★★☆</div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">{{ $package->desc }}</p>
                        
                        <a href="{{ route('packages.book', $loop->index + 1) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                            Book Now
                        </a>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
