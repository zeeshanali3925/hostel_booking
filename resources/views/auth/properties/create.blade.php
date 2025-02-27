@extends('layouts.app')

@section('title', 'List Your Property')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold text-center mb-6">List Your Property</h1>
    <form action="{{ route('store-property') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold">Property Name:</label>
            <input type="text" name="name" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Upload Images:</label>
            <input type="file" name="images[]" multiple class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Location:</label>
            <input type="text" name="location" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Price per Night:</label>
            <input type="number" name="price" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
@endsection
