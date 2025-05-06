@extends('layouts.app')

@section('title', 'Support')

@section('content')
<<<<<<< HEAD
<div class="min-h-screen bg-gradient-to-br from-sky-50 to-white py-20 px-4 sm:px-6 lg:px-16 font-sans">
    
    {{-- Hero Section --}}
    <div class="text-center mb-20">
        <h1 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-600 animate-fade-in">
            How can we help you today?
        </h1>
        <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto">
            Find answers to common questions, learn how to manage your bookings, and contact support when needed.
        </p>
        <div class="mt-8 max-w-xl mx-auto flex items-center shadow-lg rounded-full bg-white overflow-hidden">
            <input type="text" placeholder="Search help topics..." class="w-full px-5 py-3 focus:outline-none" />
            <button class="bg-indigo-600 text-white px-6 py-3 font-semibold hover:bg-indigo-700 transition-all">Search</button>
        </div>
    </div>

    {{-- Support Categories --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-24">
        @php
            $categories = [
                ['icon' => '📆', 'title' => 'Booking Help', 'desc' => 'Modify, cancel, or confirm your reservations.'],
                ['icon' => '💳', 'title' => 'Payments & Refunds', 'desc' => 'Problems with payments, invoices or refunds?'],
                ['icon' => '🔐', 'title' => 'Account Access', 'desc' => 'Reset password, update email, or secure your profile.'],
            ];
        @endphp

        @foreach($categories as $category)
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl p-8 transition-all duration-300 hover:-translate-y-1 border-t-4 border-indigo-500 relative">
                <div class="absolute top-4 right-4 text-4xl">{{ $category['icon'] }}</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $category['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $category['desc'] }}</p>
                <a href="#" class="text-indigo-600 text-sm mt-4 inline-block hover:underline">Learn more →</a>
            </div>
        @endforeach
    </div>

    {{-- FAQ Section --}}
    <div class="max-w-4xl mx-auto mb-32">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Frequently Asked Questions</h2>

        @php
            $faqs = [
                ['q' => 'How do I cancel my booking?', 'a' => 'Go to “My Bookings”, select your reservation, then click “Cancel”.'],
                ['q' => 'When will I get my refund?', 'a' => 'Refunds are typically processed within 3-7 business days.'],
                ['q' => 'Can I change my email address?', 'a' => 'Yes. Go to “Profile Settings” and update your email.'],
            ];
        @endphp

        <div class="space-y-5">
            @foreach($faqs as $index => $faq)
                <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }" 
                     class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 transition duration-300">
                    <button @click="open = !open" class="w-full text-left flex items-center justify-between">
                        <span class="font-medium text-gray-800 text-base">{{ $faq['q'] }}</span>
                        <svg :class="{ 'rotate-180': open }" class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-3 text-sm text-gray-600">
                        {{ $faq['a'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Contact Support CTA --}}
    <div class="text-center mt-10">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Still need help?</h3>
        <p class="text-gray-500 mb-6">Our support team is here 24/7 to assist you.</p>
        <a href="{{ route('support') }}"
           class="inline-block px-8 py-3 bg-indigo-600 text-white font-semibold rounded-full shadow-md hover:bg-indigo-700 transition hover:scale-105">
           Contact Support
        </a>
    </div>
</div>
=======
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold">How can we help you?</h2>
        <p class="mt-4">Find answers to your questions or contact our support team.</p>
        <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-md mt-4 inline-block">Contact Support</a>
    </div>
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
@endsection
