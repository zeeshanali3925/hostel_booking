@extends('layouts.app')

@section('content')

<!-- Hero Section flight booking -->
<div class="relative h-[300px] bg-center bg-cover flex items-center justify-center" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVFWNJjJsekBONQqZY0MvsomYFmj7Ft79wA&s');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 text-white text-center px-4">
        <h1 class="text-3xl sm:text-4xl font-bold mb-2">Book Your Perfect Flight</h1>
        <p class="text-base sm:text-lg">Affordable Prices. Fast Booking. Smooth Travel.</p>
    </div>
</div>

<!-- Search Bar -->
<div class="max-w-3xl mx-auto mt-6 px-4">
    <div class="bg-white border rounded-lg flex items-center justify-between gap-3 p-3 shadow-sm">
        <input type="text" placeholder="Search flights by airline..." class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-200" />
        <button class="bg-blue-600 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
    </div>
</div>

<!-- Flights Section -->
<div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Available Flights</h2>

    @php
    $flights = [
        ['name' => 'PK301 - PIA', 'airline' => 'PIA', 'from' => 'Karachi', 'to' => 'Islamabad', 'price' => 14500, 'duration' => '2h 10m'],
        ['name' => 'EK623 - Emirates', 'airline' => 'Emirates', 'from' => 'Lahore', 'to' => 'Dubai', 'price' => 56000, 'duration' => '3h 45m'],
        ['name' => 'QR611 - Qatar Airways', 'airline' => 'Qatar Airways', 'from' => 'Islamabad', 'to' => 'Doha', 'price' => 51000, 'duration' => '4h 00m'],
        ['name' => 'SV373 - Saudia', 'airline' => 'Saudia', 'from' => 'Karachi', 'to' => 'Jeddah', 'price' => 47000, 'duration' => '4h 15m'],
        ['name' => 'PA406 - Airblue', 'airline' => 'Airblue', 'from' => 'Lahore', 'to' => 'Karachi', 'price' => 12500, 'duration' => '1h 40m'],
    ];
    $flightImages = [
        'PIA' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyV31SqZFZnkuH0jXTVKrGLMFQtM-n1Uf9Bg&s',
        'Emirates' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEkUSzrm-pYmHedF7VQD4kwyCjkJ2LX4vMJA&s',
        'Qatar Airways' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVcLA6AxxkAn4Gh_g3BXpTgK8KsOIPtnKauA&s',
        'Saudia' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDj32ZMyp6UAEHp7uOpm2CUZ33OA5C2ws6Ow&s',
        'Airblue' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjDk8F4yyuEGtdSkuPQPW7Wv8ZCOUsrVFzpg&s',
    ];
    @endphp
@if(session('success'))
<div class="max-w-3xl mx-auto mt-4 bg-green-100 border border-green-300 text-green-800 p-4 rounded">
    {{ session('success') }}
</div>
@endif

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($flights as $flight)
        <div class="bg-white border rounded-xl p-4 shadow-sm hover:shadow-md transition">
            <img src="{{ $flightImages[$flight['airline']] ?? 'https://via.placeholder.com/400x300.png?text=Flight+Image' }}"
                 alt="{{ $flight['airline'] }}"
                 loading="lazy"
                 class="w-full aspect-video object-cover rounded-md mb-3">

            <h3 class="text-lg font-semibold text-gray-800">{{ $flight['name'] }}</h3>
            <p class="text-sm text-gray-500">{{ $flight['from'] }} → {{ $flight['to'] }} | Duration: {{ $flight['duration'] }}</p>
            <p class="text-blue-600 font-bold mt-1">PKR {{ number_format($flight['price']) }}</p>

            <form action="{{ route('flight.book', $flight['name']) }}" method="POST" class="mt-4 bg-gray-50 border border-gray-200 rounded-xl p-5 shadow-md space-y-5 transition-all">
                @csrf
            
                <!-- Trip Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trip Type</label>
                    <select name="trip_type" class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="one_way">One-way</option>
                        <option value="round_trip">Round Trip</option>
                    </select>
                </div>
            
                <!-- Dates -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="departure_date" class="block text-sm font-medium text-gray-700 mb-1">Departure Date *</label>
                        <input type="date" id="departure_date" name="departure_date"
                               class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>
            
                    <div>
                        <label for="return_date" class="block text-sm font-medium text-gray-700 mb-1">Return Date</label>
                        <input type="date" id="return_date" name="return_date"
                               class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>
            
                <!-- Passenger Count -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Adults</label>
                        <input type="number" name="adults" min="1" value="1"
                               class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>
            
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Children</label>
                        <input type="number" name="children" min="0" value="0"
                               class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
            
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Infants</label>
                        <input type="number" name="infants" min="0" value="0"
                               class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>
            
                <!-- Travel Class -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                    <select name="travel_class"
                            class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="economy">Economy</option>
                        <option value="business">Business</option>
                        <option value="first">First Class</option>
                    </select>
                </div>
            
                <!-- Special Requests -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Special Requests</label>
                    <textarea name="special_request" rows="2"
                              class="w-full px-4 py-2 border border-gray-300 bg-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                              placeholder="e.g., Window seat, wheelchair, etc."></textarea>
                </div>
            
                <!-- Terms -->
                <div class="flex items-start gap-2">
                    <input type="checkbox" name="agree" required class="mt-1">
                    <label class="text-sm text-gray-600">I agree to the <a href="#" class="text-blue-600 hover:underline">terms & conditions</a>.</label>
                </div>
            
                <!-- Button -->
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg text-sm transition-all duration-200 shadow-sm">
                    Book Flight
                </button>
            </form>
            
        </div>
        @endforeach
    </div>
</div>
@endsection
