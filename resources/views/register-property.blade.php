@extends('layouts.app')

@section('title', 'List Your Property')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h2 class="text-3xl font-bold text-blue-600 text-center mb-6">🏡 Property Registration</h2>
    
    <form id="propertyForm" action="{{ route('register-property') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" id="name" name="name" placeholder="Property Name" class="input-field" required>
        <input type="text" id="address" name="address" placeholder="Address" class="input-field" required>

        <div class="grid grid-cols-2 gap-4">
            <input type="text" id="city" name="city" placeholder="City" class="input-field" required>
            <input type="text" id="state" name="state" placeholder="State" class="input-field" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <input type="text" id="zip" name="zip" placeholder="Zip Code" class="input-field" required>
            <select id="country" name="country" class="input-field" required>
                <option value="">Select Country</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="UK">United Kingdom</option>
                <option value="India">India</option>
                <option value="Australia">Australia</option>
                <option value="pakistan">pakistan</option>
                <option value="india">india</option>

            </select>
        </div>

        <input type="email" id="email" name="email" placeholder="Email" class="input-field" required>
        <input type="tel" id="phone" name="phone" placeholder="Phone" class="input-field" required>
        <textarea id="description" name="description" rows="3" placeholder="Property Details" class="input-field" required></textarea>
        <form id="propertyForm" action="{{ route('property-data-save') }}" method="POST">
            @csrf
         
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">Submit</button>
        </form>
        
</div>

<script>
    document.getElementById('propertyForm').addEventListener('submit', function (e) {
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let phonePattern = /^\d{10,}$/;
        let email = document.getElementById('email').value.trim();
        let phone = document.getElementById('phone').value.trim();

        if (!emailPattern.test(email)) {
            alert("Invalid email format!");
            e.preventDefault();
        }

        if (!phonePattern.test(phone)) {
            alert("Phone number must be at least 10 digits.");
            e.preventDefault();
        }
    });
</script>

<style>
    .input-field {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
        transition: 0.3s;
    }
    .input-field:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
    }
</style>

@endsection