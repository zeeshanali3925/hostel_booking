@extends('layouts.app')

@section('title', $package->title)

@section('content')
<div class="container mx-auto py-16 px-4">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ $package->image }}" class="w-full h-96 object-cover" alt="{{ $package->title }}">
        <div class="p-8">
            <h2 class="text-3xl font-bold mb-4">{{ $package->title }}</h2>
            <p class="text-lg text-blue-600 font-semibold mb-2">{{ $package->price }}</p>
            <p class="text-gray-700 mb-6">{{ $package->desc }}</p>
            <a href="{{ route('packages.pakages') }}" class="text-blue-500 hover:underline">← Back to Packages</a>
        </div>
    </div>
</div>
@endsection
