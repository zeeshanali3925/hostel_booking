@extends('layouts.app')

@section('title', 'List Your Property')

@section('content')
<div class="min-h-screen bg-[#f5fafd] py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white border border-gray-200 rounded-xl p-8 shadow-sm">

        {{-- Heading --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">🏠 List Your Property</h1>
            <p class="text-gray-500 text-base mt-1">Reach thousands of travelers — it's simple & free.</p>
        </div>

        {{-- Form --}}
        <form id="propertyForm" action="{{ route('register-property') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Property & Address --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="🏡 Property Name" class="input" required>
                <input type="text" name="address" placeholder="📍 Address" class="input" required>
            </div>

            {{-- City & State --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <input type="text" name="city" placeholder="🌆 City" class="input" required>
                <input type="text" name="state" placeholder="🏙️ State" class="input" required>
            </div>

            {{-- Zip & Country --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <input type="text" name="zip" placeholder="📫 Zip Code" class="input" required>
                <select name="country" class="input" required>
                    <option value="">🌍 Select Country</option>
                    <option>Pakistan</option>
                    <option>India</option>
                    <option>USA</option>
                    <option>UK</option>
                    <option>Canada</option>
                    <option>Australia</option>
                </select>
            </div>

            {{-- Email & Phone --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <input type="email" name="email" placeholder="✉️ Email" id="email" class="input" required>
                <input type="tel" name="phone" placeholder="📞 Phone" id="phone" class="input" required>
            </div>

            {{-- Description --}}
            <textarea name="description" rows="4" class="input resize-none" placeholder="Write about your property..." required></textarea>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg text-sm font-semibold transition">
                🚀 Submit Property
            </button>
        </form>
    </div>
</div>

{{-- Basic JS Validation --}}
<script>
    document.getElementById('propertyForm').addEventListener('submit', function (e) {
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
            alert('Invalid email!');
            e.preventDefault();
        }
        if (!/^[0-9]{10,}$/.test(phone)) {
            alert('Phone must be at least 10 digits.');
            e.preventDefault();
        }
    });
</script>

{{-- 💡 Minimal Inline CSS for Fast Load --}}
<style>
    .input {
        width: 100%;
        padding: 12px 14px;
        background: #f0faff;
        border: 1px solid #cde7f0;
        border-radius: 8px;
        font-size: 14px;
        color: #1e293b;
        transition: 0.2s ease;
    }

    .input:focus {
        background: #fff;
        outline: none;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 2px rgba(14, 165, 233, 0.2);
    }

    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
</style>
@endsection
