@extends('layouts.app')

@section('title', 'List Your Property')

@section('content')

<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-blue-900 via-blue-700 to-blue-500 h-[90vh] flex items-center justify-center text-center text-white">
    <div class="max-w-3xl">
        <h1 class="text-6xl font-extrabold drop-shadow-lg">🏡 List Your Property on <span class="text-yellow-400">Expedia</span></h1>
        <p class="mt-4 text-xl font-medium text-gray-200">Join millions of hosts and start earning today.</p>
        <a href="{{ route('register-property') }}"
               class="mt-6 inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-10 py-4 rounded-full text-lg shadow-lg transition transform hover:scale-110 hover:shadow-2xl">
            Get Started
        </a>
    </div>
</div>

<section class="container mx-auto py-20 text-center px-6">
    <h2 class="text-5xl font-extrabold text-yellow-500">✨ What Do You Want to List?</h2>
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        
        <!-- Hotels & Resorts -->
        <div class="bg-gradient-to-b from-blue-800 to-blue-600 shadow-lg rounded-xl p-8 border border-yellow-400 hover:shadow-2xl transition-all duration-300 hover:scale-105 hover:from-blue-700 hover:to-blue-500">
            <h3 class="text-3xl font-bold text-yellow-300">🏨 Hotels & Resorts</h3>
            <p class="text-gray-200 mt-3">List your hotel, motel, or resort.</p>
        </div>

        <!-- Private Homes -->
        <div class="bg-gradient-to-b from-green-800 to-green-600 shadow-lg rounded-xl p-8 border border-lime-400 hover:shadow-2xl transition-all duration-300 hover:scale-105 hover:from-green-700 hover:to-green-500">
            <h3 class="text-3xl font-bold text-lime-300">🏡 Private Homes</h3>
            <p class="text-gray-200 mt-3">Rent out your apartment or villa.</p>
        </div>

        <!-- Unique Experiences -->
        <div class="bg-gradient-to-b from-purple-800 to-purple-600 shadow-lg rounded-xl p-8 border border-pink-400 hover:shadow-2xl transition-all duration-300 hover:scale-105 hover:from-purple-700 hover:to-purple-500">
            <h3 class="text-3xl font-bold text-pink-300">🏕️ Unique Experiences</h3>
            <p class="text-gray-200 mt-3">List treehouses, farms, and more!</p>
        </div>

    </div>
</section>


<!-- Why List with Us? -->
<section class="bg-gradient-to-r from-gray-900 via-gray-800 to-black py-20">
    <div class="container mx-auto text-center px-6">
        <h2 class="text-5xl font-extrabold text-yellow-500">🚀 Why List Your Property?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-12">
            
            <div class="p-8 bg-white/10 border border-yellow-500 shadow-lg rounded-xl hover:shadow-2xl transition transform hover:-translate-y-2 duration-300">
                <h3 class="text-2xl font-semibold text-yellow-400">🌍 Reach Global Guests</h3>
                <p class="text-gray-300 mt-3">Millions of travelers visit our platform.</p>
            </div>

            <div class="p-8 bg-white/10 border border-pink-500 shadow-lg rounded-xl hover:shadow-2xl transition transform hover:-translate-y-2 duration-300">
                <h3 class="text-2xl font-semibold text-pink-400">⚡ Instant Bookings</h3>
                <p class="text-gray-300 mt-3">Real-time availability and easy management.</p>
            </div>

            <div class="p-8 bg-white/10 border border-purple-500 shadow-lg rounded-xl hover:shadow-2xl transition transform hover:-translate-y-2 duration-300">
                <h3 class="text-2xl font-semibold text-purple-400">💰 No Upfront Costs</h3>
                <p class="text-gray-300 mt-3">Only pay when you receive bookings.</p>
            </div>

        </div>
    </div>
</section>

@endsection