@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="relative h-[300px] bg-center bg-cover flex items-center justify-center" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLXOsdh22J-rk7oosRWiiy7PBbGjc0kjw-DA&s');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 text-white text-center px-4">
        <h1 class="text-3xl sm:text-4xl font-bold mb-2">Rent Your Perfect Ride</h1>
        <p class="text-base sm:text-lg">Affordable Cars. Easy Booking. Fast Experience.</p>
    </div>
</div>

<!-- Search Bar -->
<div class="max-w-3xl mx-auto mt-6 px-4">
    <div class="bg-white border rounded-lg flex items-center justify-between gap-3 p-3 shadow-sm">
        <input type="text" placeholder="Search cars by name..." class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-200" />
        <button class="bg-blue-600 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
    </div>
</div>

<!-- Cars Section -->
<div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Available Cars</h2>


   
    @if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

    @php
    $cars = [
        ['name' => 'Honda City 1.5L Aspire', 'brand' => 'Honda', 'seats' => 5, 'price_per_day' => 4500, 'year' => 2022, 'fuel' => 'Petrol'],
        ['name' => 'Toyota Corolla Altis', 'brand' => 'Toyota', 'seats' => 5, 'price_per_day' => 5000, 'year' => 2023, 'fuel' => 'Petrol'],
        ['name' => 'Suzuki Cultus VXL', 'brand' => 'Suzuki', 'seats' => 4, 'price_per_day' => 3200, 'year' => 2021, 'fuel' => 'Petrol'],
        ['name' => 'KIA Sportage AWD', 'brand' => 'KIA', 'seats' => 5, 'price_per_day' => 6500, 'year' => 2024, 'fuel' => 'Petrol'],
        ['name' => 'Hyundai Tucson GLS', 'brand' => 'Hyundai', 'seats' => 5, 'price_per_day' => 6400, 'year' => 2023, 'fuel' => 'Petrol'],
        ['name' => 'Honda Civic Oriel', 'brand' => 'Honda', 'seats' => 5, 'price_per_day' => 6000, 'year' => 2023, 'fuel' => 'Petrol'],
        ['name' => 'Toyota Fortuner Sigma', 'brand' => 'Toyota', 'seats' => 7, 'price_per_day' => 8500, 'year' => 2024, 'fuel' => 'Diesel'],
        ['name' => 'Suzuki Wagon R VXL', 'brand' => 'Suzuki', 'seats' => 4, 'price_per_day' => 2800, 'year' => 2020, 'fuel' => 'Petrol'],
        ['name' => 'MG HS Exclusive', 'brand' => 'MG Motors', 'seats' => 5, 'price_per_day' => 7000, 'year' => 2024, 'fuel' => 'Petrol'],
        ['name' => 'Nissan Dayz', 'brand' => 'Nissan', 'seats' => 4, 'price_per_day' => 2500, 'year' => 2019, 'fuel' => 'Petrol'],
    ];
    $imageUrls = [
            'Honda City 1.5L Aspire' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862033/images_-_Copy_t7idqp.jpg',
            'Toyota Corolla Altis' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862148/images_1_wick7h.jpg',
            'Suzuki Cultus VXL' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862195/images_2_anw81l.jpg',
            'KIA Sportage AWD' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_MyP_m465pueasHSompUmsTLO1i1zQ2pvqA&s',
            'Hyundai Tucson GLS' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862324/hyundai-tucson-starry-night_mc9sua.png',
            'Honda Civic Oriel' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862382/images_4_nfibba.jpg',
            'Toyota Fortuner Sigma' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862425/images_5_cty5dd.jpg',
            'Suzuki Wagon R VXL' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQybfd5nhfvFd3RcHL41aI6kYs4f3edg0AlVw&s',
            'MG HS Exclusive' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862517/images_7_y3ngce.jpg',
            'Nissan Dayz' => 'https://res.cloudinary.com/dbmje4afl/image/upload/v1745862565/images_8_xlf0hm.jpg',
        ];
@endphp


    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($cars as $car)
        <div class="bg-white border rounded-xl p-4 shadow-sm hover:shadow-md transition">
            <img src="{{ $imageUrls[$car['name']] ?? 'https://via.placeholder.com/400x300.png?text=Car+Image' }}"
                 alt="{{ $car['name'] }}"
                 loading="lazy"
                 class="w-full aspect-video object-cover rounded-md mb-3">

            <h3 class="text-lg font-semibold text-gray-800">{{ $car['name'] }}</h3>
            <p class="text-sm text-gray-500">{{ $car['brand'] }} | Seats: {{ $car['seats'] }} | Fuel: {{ $car['fuel'] }}</p>
            <p class="text-xs text-gray-400">Model Year: {{ $car['year'] }}</p>
            <p class="text-blue-600 font-bold mt-1">PKR {{ number_format($car['price_per_day']) }}/day</p>

            <form action="{{ route('car.book', $car['name']) }}" method="POST" class="mt-4 space-y-3">
                @csrf

                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <label>From</label>
                        <select name="from_city" class="w-full border rounded p-1" required>
                            <option value="">Select</option>
                            <option>Karachi</option>
                            <option>Lahore</option>
                            <option>Islamabad</option>
                            <option>Peshawar</option>
                        </select>
                    </div>
                    <div>
                        <label>To</label>
                        <select name="to_city" class="w-full border rounded p-1" required>
                            <option value="">Select</option>
                            <option>Karachi</option>
                            <option>Lahore</option>
                            <option>Islamabad</option>
                            <option>Peshawar</option>
                        </select>
                    </div>
                </div>

                <div class="bg-blue-50 border rounded p-2 text-xs text-blue-700">
                    <strong>Estimated City Rent:</strong><br>
                    Karachi to Lahore = PKR 5,000 extra
                </div>

                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <label>Booking Date</label>
                        <input type="date" name="booking_date" class="w-full border rounded p-1" required>
                    </div>
                    <div>
                        <label>Return Date</label>
                        <input type="date" name="return_date" class="w-full border rounded p-1" required>
                    </div>
                </div>

                <button type="submit" class="w-full text-sm bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Book Now</button>

            </form>


            
        </div>
        @endforeach
    </div>
</div>
@endsection
