<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Expedia Clone')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- Header Start -->
<header class="bg-blue-600 p-4 shadow-md">
  <nav class="container mx-auto flex justify-between items-center relative">
    <a href="{{ route('home') }}" class="text-white text-3xl font-extrabold">Hostels.pk</a>
    <ul class="flex space-x-6 text-white relative">

      <!-- Shop Travel Dropdown -->
      <li class="relative">
        <button onclick="toggleDropdown('travel-dropdown')" class="hover:underline transition flex items-center">
          Shop Travel
        </button>
        <ul id="travel-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-white text-black shadow-lg rounded-md py-2 z-50">
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            ✈️ <a href="{{ url('flights') }}" class="ml-2">Flights</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            🏨 <a href="{{ url('stays') }}" class="ml-2">Stays</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            🚗 <a href="{{ url('car_booking') }}" class="ml-2">Cars</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            🎟️ <a href="{{ url('pakages') }}" class="ml-2">Packages</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            🎢 <a href="{{ url('things') }}" class="ml-2">Things to do</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            🚢 <a href="{{ url('cruisis') }}" class="ml-2">Cruises</a>
          </li>
        </ul>
      </li>

      <!-- Language Dropdown -->
      <li class="relative">
        <button onclick="toggleDropdown('language-dropdown')" class="hover:underline transition flex items-center">
          Language
        </button>
        <ul id="language-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-white text-black shadow-lg rounded-md py-2 z-50">
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            <a href="#" class="ml-2">English</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            <a href="#" class="ml-2">Urdu</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            <a href="#" class="ml-2">Hindi</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            <a href="#" class="ml-2">Japanese</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            <a href="#" class="ml-2">Arabic</a>
          </li>
          <li class="flex items-center px-4 py-2 hover:bg-gray-200">
            <a href="#" class="ml-2">French</a>
          </li>
        </ul>
      </li>

      <!-- Other menu items -->
      <li><a href="{{ route('list-your-property') }}" class="hover:underline transition">List Your Property</a></li>
      <li><a href="{{ route('support') }}" class="hover:underline transition">Support</a></li>
      <li><a href="{{ route('trips') }}" class="hover:underline transition">Trips</a></li>
      <li><a href="{{ route('chat') }}" class="hover:underline transition">Help Center</a></li>
      <li>
        <a href="{{ route('sign-in') }}" class="bg-white text-blue-600 px-6 py-2 rounded-md hover:bg-gray-200 transition">
          Sign In
        </a>
      </li>
    </ul>
  </nav>
</header>
<!-- Header End -->

<!-- Main Content Start -->
<main class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
  @yield('content')
</main>
<!-- Main Content End -->

<!-- Footer Start -->
<footer class="bg-blue-600 text-white text-center p-4 mt-10">
  <p>&copy; {{ date('Y') }} Expedia Clone. All rights reserved.</p>
</footer>
<!-- Footer End -->

<!-- Scripts -->

<script>
  // Show dropdown on hover or click
  function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    const allDropdowns = document.querySelectorAll('ul[id$="-dropdown"]');

    // Hide other dropdowns
    allDropdowns.forEach(d => {
      if (d.id !== id) {
        d.classList.add('hidden');
      }
    });

    // Toggle current dropdown
    dropdown.classList.toggle('hidden');
  }

  // Close dropdown if click outside
  document.addEventListener('click', function(event) {
    const isDropdownButton = event.target.closest('button');
    const isDropdownContent = event.target.closest('ul[id$="-dropdown"]');

    if (!isDropdownButton && !isDropdownContent) {
      const allDropdowns = document.querySelectorAll('ul[id$="-dropdown"]');
      allDropdowns.forEach(d => d.classList.add('hidden'));
    }
  });
</script>





























</body>
</html>
