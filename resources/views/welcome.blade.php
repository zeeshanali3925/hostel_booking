@extends('layouts.app')

@section('title', 'Support')

@section('content')
@php
    $imageUrls = [
        'https://liveworkplaytravel.com/wp-content/uploads/2021/12/HostelReception.jpg',
        'https://cf.bstatic.com/xdata/images/hotel/max1024x768/607716065.jpg?k=5f664d89b10889dd70d25e6ae487e67cbe02d067db0157cd5d63f1ec416fd4f6&o=&hp=1',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYsX7CorAq76t3LRMNmZ5ry0IBixUsKO12IQ&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxB4yigjuY9Ax-YNTt4WASall9eRPWS6gBxg&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmgZ10yElKj9lUuJlGX2DtQnaxQUMnsou8pg&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrMjv3QkTcwRBUyeQcX9blEz8xp-sgM97CAw&s',
    ];

    $uploadedImages = glob(public_path('uploads/*'));
@endphp

{{-- Upload Section --}}
<div class="container mx-auto py-10">
    {{-- Upload Form --}}
    <form id="imageUploadForm" action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="imageUpload" 
            class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-3 px-6 w-64 h-48 flex items-center justify-center rounded-lg shadow-lg transition duration-300 transform hover:scale-105 cursor-pointer">
            Upload New Image
        </label>
        <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*" onchange="document.getElementById('imageUploadForm').submit();" />
    </form>

    {{-- Upload Status --}}
    <div id="uploadStatus" class="text-center text-green-600 font-semibold mt-4">
        @if(session('success'))
            {{ session('success') }}
        @endif
    </div>

    {{-- Delete Last Uploaded Image --}}
    @if(session('image'))
        <form action="{{ route('delete.image') }}" method="POST" class="mt-4 text-center">
            @csrf
            @method('DELETE')
            <input type="hidden" name="image_name" value="{{ session('image') }}">
        </form>
    @endif
</div>

{{-- Uploaded Images --}}
@if(count($uploadedImages) > 0)
    <div class="container mx-auto py-10">
        <h2 class="text-xl font-bold mb-4">Uploaded Images</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($uploadedImages as $path)
                @php
                    $relativePath = 'uploads/' . basename($path);
                @endphp
                <div class="card bg-white rounded-lg shadow-lg overflow-hidden relative transition-transform duration-300 hover:scale-105">
                    
                    {{-- Delete Button (Small Black Cross Icon) --}}
                    <form action="{{ route('delete.image') }}" method="POST" class="absolute top-1 right-1">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="image_name" value="{{ basename($path) }}">
                        <button type="submit" 
                            class="bg-white text-black border border-gray-400 rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-red-500 transition duration-300 text-sm font-bold shadow-md" 
                            title="Delete Image">
                            ×
                        </button>
                    </form>

                    
                    {{-- Image Display --}}
                    <img 
                        src="{{ asset($relativePath) }}" 
                        alt="Uploaded Image" 
                        class="w-full max-h-96 object-contain transition-transform duration-300"
                    >
                </div>
            @endforeach
        </div>
    </div>
@endif

{{-- Default Images --}}
<div class="container mx-auto py-10">
    <h2 class="text-xl font-bold mb-4">Default Hostel Images</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @foreach($imageUrls as $index => $url)
            <div class="card bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="w-full h-64 bg-gray-100 flex items-center justify-center overflow-hidden">
                    <img 
                        src="{{ $url }}" 
                        alt="Hostel Image {{ $index + 1 }}" 
                        class="max-w-full max-h-full object-contain"
                    >
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('styles')
<style>
    .card {
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        border-radius: 12px;
    } 
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .card img {
        border-radius: 12px;
        transition: transform 0.3s ease;
    }
    #uploadStatus {
        font-weight: bold;
        font-size: 1.1rem;
    }
    /* Cross Button Extra Styling */
    .card button {
        font-size: 0.9rem;
        font-weight: bold;
        line-height: 1;
        padding: 0;
    }
</style>
@endpush

@endsection
