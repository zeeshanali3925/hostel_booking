@extends('layouts.app')

@section('title', 'Stay Confirmation')

@section('styles')
<style>
    /* Main Confirmation Container */
    .confirmation-container {
        background: #ffffff;
        padding: 50px 40px;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        text-align: center;
        width: 90%;
        max-width: 600px;
        animation: fadeIn 0.7s ease-in-out;
    }

    /* Animation for Fade In */
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    /* Confirmation Icon Styling */
    .confirmation-icon {
        font-size: 80px;
        color: #4CAF50;
        margin-bottom: 20px;
    }

    /* Heading Styling */
    h1 {
        font-size: 40px;
        margin-bottom: 15px;
        color: #222;
        font-weight: 700;
    }

    h2 {
        font-size: 22px;
        color: #777;
        margin-bottom: 30px;
    }

    /* Paragraph Styling */
    p {
        font-size: 18px;
        color: #555;
        margin-bottom: 10px;
    }

    /* Stay Details Section Styling */
    .stay-details {
        background-color: #f7f9fc;
        padding: 25px;
        border-radius: 12px;
        margin: 25px 0;
        text-align: left;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .stay-details p {
        margin: 8px 0;
        font-size: 16px;
        color: #333;
    }

    /* Custom Buttons Styling */
    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 15px 40px;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: bold;
        border-radius: 50px;
        text-align: center;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    /* Back Button Styling */
    .btn-back {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #2980b9, #3498db);
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    /* Homepage Button Styling */
    .btn-home {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-home:hover {
        background: linear-gradient(135deg, #e67e22, #f39c12);
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="confirmation-container">
        <!-- Success Icon -->
        <div class="confirmation-icon">✔️</div>
        
        <!-- Title -->
        <h1 class="text-3xl font-bold text-indigo-800 mb-4">Booking Confirmed!</h1>
        <h2 class="text-lg text-gray-600 mb-6">Your stay has been confirmed successfully.</h2>

        <!-- Stay Details -->
        <div class="stay-details">
            <p><strong>Stay ID:</strong> {{ $id }}</p>
            <p><strong>Status:</strong> Confirmed ✅</p>
            <p><strong>Payment Status:</strong> Completed 💳</p>
            <p><strong>Check-in Date:</strong> Soon 📅</p>
        </div>

        <!-- Action Buttons -->
        <a href="{{ route('stays.index') }}" class="btn btn-back">Back to Stays List</a><br>
        <a href="{{ url('/') }}" class="btn btn-home">Go to Homepage</a>
    </div>
</div>
@endsection
