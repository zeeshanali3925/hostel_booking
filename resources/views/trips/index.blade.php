@extends('layouts.app')

@section('title', 'Trip Planner')

@section('content')
    <div class="text-center p-10">
        <h2 class="text-3xl font-bold text-gray-800">Plan Your Next Adventure!</h2>
        <img src="https://a.travel-assets.com/egds/illustrations/uds-default/baggage__large.svg" class="w-48 mx-auto my-5">
        <p class="text-gray-600">Save money with exclusive deals and earn rewards.</p>
        <a href="{{ url('/login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg mt-4 hover:bg-blue-700 transition inline-block">Sign in or Create an Account</a>
        <div class="mt-4">
            <p class="text-gray-700">Don’t have an account? <a href="#" class="text-blue-600 font-semibold hover:underline">Find a booking with your itinerary number</a></p>
        </div>
    </div>
    <div class="bg-gray-100 p-6 rounded-lg text-center mt-10">
        <h3 class="text-2xl font-semibold text-gray-800">Download the Expedia App</h3>
        <p class="text-gray-600">Get exclusive discounts up to 20% on select hotels.</p>
        <img src="https://a.travel-assets.com/mad-service/qr-code/footer_qr/1_QR_FOOTER.png" class="w-24 mx-auto my-4">
    </div>
@endsection