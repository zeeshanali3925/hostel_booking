@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-center text-indigo-800 mb-10">Find Comfortable Stays</h1>

    <!-- Search Bar (UI only for now) -->
    <div class="flex justify-center mb-8">
        <input type="text" id="search" placeholder="Search stays by city, location..." class="w-full max-w-xl border border-gray-300 rounded-lg px-4 py-2 shadow focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <!-- Grid of Stays -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($stays as $stay)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
            <div class="relative">
                <img src="{{ $stay['image'] }}" alt="{{ $stay['title'] }}" class="w-full h-52 object-cover" loading="lazy">
                <span class="absolute top-2 left-2 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow">{{ $stay['badge'] }}</span>
            </div>
            <div class="p-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $stay['title'] }}</h2>
                <p class="text-gray-500 text-sm mb-2">{{ $stay['location'] }}</p>

                <div class="flex items-center justify-between mb-3">
                    <span class="text-green-600 font-bold text-lg">${{ $stay['price'] }}/night</span>
                    <div class="flex items-center text-yellow-500 text-sm">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($stay['rating'] >= $i)
                                ★
                            @elseif ($stay['rating'] >= $i - 0.5)
                                ☆
                            @else
                                <span class="text-gray-300">★</span>
                            @endif
                        @endfor
                    </div>
                </div>



                
                <div class="flex justify-between">
                    <a href="{{ route('stay.show',['id' => $stay->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition text-sm">View Details</a>
                    
                    <a href="{{ route('stay.book', ['id' => $stay->id]) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Optional: You can add live search functionality here to filter stays as the user types
    document.getElementById('search').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const stays = document.querySelectorAll('.bg-white');
        
        stays.forEach(stay => {
            const title = stay.querySelector('h2').textContent.toLowerCase();
            const location = stay.querySelector('p').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || location.includes(searchTerm)) {
                stay.style.display = '';
            } else {
                stay.style.display = 'none';
            }
        });
    });
</script>

@endsection
