@extends('layouts.app')


@section('title', 'Find Cheap Hostels in Pakistan | Hostel.com')

@section('content')

<main class="container mx-auto mt-10 space-y-12 px-4">

  <!-- 🔍 Search Bar Start -->
  <section class="bg-white p-8 rounded-2xl shadow-xl border border-blue-100">
    <h2 class="text-3xl font-bold mb-6 text-center text-black-700">🔍 Find Your Hostel</h2>

    <form action="{{ route('search') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">

        <!-- Destination -->
 <!-- 📍 Destination Dropdown -->
<div class="relative">
    <label class="text-sm text-gray-600">📍 Destination</label>
    <input id="destination" type="text" placeholder="e.g. Select a city"
           class="p-3 w-full rounded border focus:ring-2" autocomplete="off">
  
    <ul id="cities" class="hidden absolute w-full bg-white border mt-1 rounded shadow text-sm max-h-60 overflow-y-auto">
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Lahore</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Karachi</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Islamabad</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Peshawar</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Quetta</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Multan</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Faisalabad</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Rawalpindi</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Hyderabad</li>
      <li class="px-3 py-2 hover:bg-blue-100 cursor-pointer">Sialkot</li>
    </ul>
  </div>
  
  <script>
    const input = document.getElementById('destination');
    const dropdown = document.getElementById('cities');
  
    // Show dropdown instantly
    input.addEventListener('focus', () => dropdown.classList.remove('hidden'));
    input.addEventListener('click', () => dropdown.classList.remove('hidden'));
  
    // Select instantly without delay or reload
    dropdown.addEventListener('mousedown', e => {
      if (e.target.tagName === 'LI') {
        input.value = e.target.textContent;
        dropdown.classList.add('hidden');
      }
    });
  
    // Hide if clicked outside
    document.addEventListener('click', e => {
      if (!dropdown.contains(e.target) && e.target !== input) {
        dropdown.classList.add('hidden');
      }
    });
  </script>
  
          

        <!-- Check-in -->
        <div class="flex flex-col">
            <label for="checkin" class="text-sm text-gray-600 mb-1"> Check-in (Arrival Date)</label>
            <input type="date" name="checkin" id="checkin"
            class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
        </div>

        <!-- Check-out -->
        <div class="flex flex-col">
            <label for="checkout" class="text-sm text-gray-600 mb-1"> Check-out (Return Date)</label>
            <input type="date" name="checkout" id="checkout"
            class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800"  >
        </div>

        <!-- Guests -->
        <div class="flex flex-col">
            <label for="guests" class="text-sm text-gray-600 mb-1"> Guests</label>
            <input type="number" name="guests" id="guests" min="1"
                placeholder="No. of guests"
                class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
        </div>

        <!-- Search Button -->
        <div class="flex items-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-all w-full">
                🔎 Search
            </button>
        </div>
    </form>
</section>

<!-- Search Bar End -->



<!-- Upload Destination Form -->








    <!-- ✈️ Popular Destinations Start -->
    @php
    use Carbon\Carbon;
@endphp

<section>
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Popular Destinations</h2>
    <div class="overflow-x-auto flex space-x-4 pb-2">
        @foreach(['Karachi', 'Lahore', 'Islamabad', 'Murree', 'Dubai', 'Istanbul'] as $city)
            @php
                $randomDays = rand(1, 30); // Random future date
                $availableDate = Carbon::now()->addDays($randomDays)->format('d M Y');
            @endphp
            <div class="min-w-[220px] bg-white rounded-2xl shadow-md overflow-hidden hover:scale-105 transition">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeuI4XJg6OhhHKiaKaaRcnAhTXXgvN-uc1dA&s" alt="{{ $city }}" class="w-full h-36 object-cover">

                <div class="p-3">
                    <h3 class="font-semibold text-lg text-blue-700">{{ $city }}</h3>
                    <p class="text-sm text-gray-500">Explore top places</p>
                    <p class="text-xs text-green-600 mt-1">📅 Available from: <span class="font-medium">{{ $availableDate }}</span></p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</section>
 
    <!-- Popular Destinations End -->

    <!-- 🎁 Offers Section Start -->
    <section class="bg-blue-50 p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-red-600">Special Offers Just for You</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(range(1, 3) as $offer)
                <div class="bg-white border rounded-lg p-4 hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-blue-700">🎉 Get 20% Off on Hostels</h3>
                    <p class="text-sm text-gray-700 mt-2">Limited time only! On bookings above PKR 10,000.</p>
                    <a href="{{ url('offers') }}" class="text-indigo-600 mt-2 inline-block hover:underline font-medium">Book Now</a>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Offers Section End -->

    <!-- 💬 Testimonials Section Start -->
    <section class="bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">What Our Customers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-5 rounded-lg shadow">
                <p class="italic text-gray-700">"Hostels.pk made my trip smooth and easy. Booking was a breeze!"</p>
                <p class="mt-3 font-semibold text-blue-700">- Ayesha Khan</p>
            </div>
            <div class="bg-gray-50 p-5 rounded-lg shadow">
                <p class="italic text-gray-700">"Affordable prices and great customer support. Highly recommended."</p>
                <p class="mt-3 font-semibold text-blue-700">- Ahmed Raza</p>
            </div>
        </div>
    </section>
    <!-- Testimonials End -->

   <!-- 📨 Newsletter Section Start -->
<section class="bg-blue-100 p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-blue-800 text-center">Subscribe to Our Newsletter</h2>
{{-- 
    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col md:flex-row items-center gap-4"> --}}
        @csrf
        <input type="email" name="email" placeholder="Enter your email"
            required
            class="p-3 rounded-lg w-full md:w-1/2 text-gray-800 border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        
        <button type="submit"
            class="bg-blue-600 text-white font-medium px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            Subscribe
        </button>
    </form>
</section>
<!-- Newsletter End -->

    <!-- Newsletter End -->

    <!-- 🏨 Hostel Listings Section Start -->
    @if(count($hostelsAll) > 0)
        <section>
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Available Hostels</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($hostelsAll as $hostel)
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow hover:shadow-lg transition duration-300">
                        <img src="{{ asset('storage/' . $hostel->image) }}" alt="{{ $hostel->title }}"
                             class="w-full h-60 object-cover">

                        <div class="p-5 space-y-3">
                            <h3 class="text-2xl font-bold text-indigo-700">{{ $hostel->title }}</h3>
                            <p class="text-gray-600"><strong>Location:</strong> {{ $hostel->location ?? 'Unknown' }}</p>

                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span class="text-green-600 font-semibold">Rs. {{ $hostel->price ?? 'N/A' }}</span>
                                <span>⭐ {{ $hostel->rating ?? '4.0' }}</span>
                            </div>

                            <div class="text-sm">
                                <strong>Type:</strong> {{ $hostel->type ?? 'Mixed' }}
                            </div>

                            <div class="text-sm">
                                <strong>Facilities:</strong>
                                <ul class="list-disc list-inside text-gray-600 mt-1">
                                    @php
                                        $facilities = explode(',', $hostel->facilities ?? 'Wi-Fi');
                                    @endphp
                                    @foreach($facilities as $facility)
                                        <li>{{ trim($facility) }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="pt-3">
                                <a href="#" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <p class="text-center text-gray-500 text-lg mt-10">No hostels found for your search.</p>
    @endif
    <!-- Hostel Listings End -->

</main>

=======
@section('title', 'Cheap Hotels in Hostel')

@section('content')
    <div class="header relative text-center bg-cover bg-center h-[450px]" style="background-image: url('https://via.placeholder.com/1280x450');">
        <div class="header-content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-shadow-lg">
            <h1 class="text-5xl font-bold mb-8" style="color: #ffcc00; text-shadow: 3px 3px 6px rgba(0,0,0,0.3);">Find the Best Hostel Deals</h1>
            <form class="flex justify-center gap-4 bg-white p-6 rounded-lg shadow-lg">
                
                <form action="{{ route('search') }}" method="GET" class="flex justify-center gap-4 bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex flex-col">
                        <label for="check-in" class="text-gray-700 font-semibold text-xl">Check-in</label>
                        <input type="date" id="check-in" class="p-3 w-72 border border-gray-400 rounded-lg text-lg text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div class="flex flex-col">
                        <label for="check-out" class="text-gray-700 font-semibold text-xl">Check-out</label>
                        <input type="date" id="check-out" class="p-3 w-72 border border-gray-400 rounded-lg text-lg text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    


<!-- Alpine.js کو شامل کریں -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Main Container -->
<div class="relative" x-data="guestSelector()">

    <!-- Guests Input Field -->
    <div class="flex flex-col">
        <label for="guests" class="text-gray-700 font-semibold text-xl">Guests</label>
        <input type="text" id="guests" 
            @click="open = true" 
            class="p-3 w-56 border border-gray-400 rounded-lg text-lg text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none cursor-pointer" 
            readonly 
            x-model="selectedGuests">
    </div>

    <!-- Modal Box -->
    <div x-show="open" @click.away="open = false" class="absolute top-14 left-0 bg-white p-4 w-64 border border-gray-300 rounded-lg shadow-lg">
        
        <h2 class="text-lg font-semibold mb-2">Select Guests</h2>

        <!-- Dynamic Guest Fields -->
        <template x-for="guest in guestTypes" :key="guest.key">
            <div class="flex justify-between items-center mb-3">
                <span class="text-gray-700" x-text="guest.label"></span>
                <div class="flex items-center space-x-1">
                    <button @click="if (guest.count > 0) guest.count--" class="border px-2 py-1 rounded-md">-</button>
                    <input type="number" x-model="guest.count" min="0" class="border rounded w-8 text-center">
                    <button @click="guest.count++" class="border px-2 py-1 rounded-md">+</button>
                </div>
            </div>
        </template>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3">
            <button @click="open = false" class="px-3 py-1 bg-gray-300 rounded-md text-sm">Cancel</button>
            <button @click="applySelection()" class="px-3 py-1 bg-blue-600 text-white rounded-md text-sm">Apply</button>
        </div>
    </div>

</div>

<script>
function guestSelector() {
    return {
        open: false,
        guestTypes: [
            { key: 'men', label: 'Men', count: 0 },
            { key: 'children', label: 'Children', count: 0 },
            { key: 'girls', label: 'Girls', count: 0 },
            { key: 'infants', label: 'Infants', count: 0 }
        ],
        selectedGuests: "Select Guests", // Default value

        applySelection() {
            let guestsList = this.guestTypes
                .filter(guest => guest.count > 0)
                .map(guest => `${guest.label} ${guest.count}`)
                .join(', ');

            this.selectedGuests = guestsList || "Select Guests"; // اگر کوئی مہمان منتخب نہ ہو تو "Select Guests"
            this.open = false; // ماڈل بند کریں
        }
    };
}
</script>



                    

                    
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-6 py-3 rounded-lg hover:scale-105 transition-transform font-semibold text-lg shadow-md">Search</button>
                </form>
                
    
            </form>
        </div>
    </div>

    <div class="container mx-auto py-1 text-center">
        @if(Auth::check())
            <h2 class="text-3xl font-bold text-blue-600">Welcome, {{ Auth::user()->first_name }}!</h2>
            <p class="mt-4 text-gray-700 text-lg">You are successfully logged in.</p>
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-md hover:bg-red-700 font-semibold">Logout</button>
            </form>
        @endif
    </div>

    <div class="footer bg-yellow-400 py-12 text-center">
        <h2 class="text-3xl font-bold mb-8">Plan, Book, and Stay with Confidence</h2>
        <div class="flex justify-center gap-8">
            <div class="option bg-white p-6 rounded-lg shadow-lg w-1/4 hover:shadow-xl transition-shadow">
                <h3 class="text-xl font-semibold">Be Picky</h3>
                <p class="text-gray-600 mt-2">Search almost a million properties worldwide</p>
            </div>
            <div class="option bg-white p-6 rounded-lg shadow-lg w-1/4 hover:shadow-xl transition-shadow">
                <h3 class="text-xl font-semibold">Treat Yourself</h3>
                <p class="text-gray-600 mt-2">Save instantly and earn perks with One Key</p>
                <a href="#" class="text-blue-600 mt-2 inline-block font-semibold">Learn about One Key</a>
            </div>
            <div class="option bg-white p-6 rounded-lg shadow-lg w-1/4 hover:shadow-xl transition-shadow">
                <h3 class="text-xl font-semibold">Change Your Mind</h3>
                <p class="text-gray-600 mt-2">Book hotels with free cancellation</p>
            </div>
        </div>
    </div>
@endsection



<h1>zeehan</h1>