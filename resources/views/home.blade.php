@extends('layouts.app')

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