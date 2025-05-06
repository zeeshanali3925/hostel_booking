@extends('layouts.app')

@section('title', 'Support')

@section('content')
@php
    use App\Models\Image;

    $imageUrls = [
        'https://liveworkplaytravel.com/wp-content/uploads/2021/12/HostelReception.jpg',
        'https://cf.bstatic.com/xdata/images/hotel/max1024x768/607716065.jpg?k=5f664d89b10889dd70d25e6ae487e67cbe02d067db0157cd5d63f1ec416fd4f6&o=&hp=1',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYsX7CorAq76t3LRMNmZ5ry0IBixUsKO12IQ&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxB4yigjuY9Ax-YNTt4WASall9eRPWS6gBxg&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmgZ10yElKj9lUuJlGX2DtQnaxQUMnsou8pg&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrMjv3QkTcwRBUyeQcX9blEz8xp-sgM97CAw&s',
    ];

    $dbImages = Image::latest()->get();
@endphp

{{-- Upload Section --}}
<div class="container mx-auto py-10 px-4">
    <div class="flex flex-col items-center space-y-4">
        <form id="imageUploadForm" action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="imageUpload"
                   class="cursor-pointer bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                Upload New Image
            </label>
            <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*"
                   onchange="document.getElementById('imageUploadForm').submit();" />
        </form>

        @if(session('success'))
            <div id="uploadStatus" class="text-green-600 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

{{-- ✅ Default Hostel Images --}}
<div class="container mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Default Hostel Images</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($imageUrls as $index => $url)
            <div class="card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                    <img src="{{ $url }}" alt="Hostel Image {{ $index + 1 }}"
                         class="h-full w-full object-cover transition-opacity duration-300 opacity-0"
                         loading="eager"
                         onload="this.style.opacity='1'" />
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- ✅ Uploaded Images --}}
@if(count($dbImages) > 0)
    <div class="container mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Uploaded Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($dbImages as $image)
                <div class="card relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-transform transform hover:scale-105">
                    {{-- Delete --}}
                    <form method="POST" action="{{ route('delete.image') }}" onsubmit="return confirm('Are you sure you want to delete this image?')"
                          class="absolute top-2 right-2 bg-white bg-opacity-80 rounded-full p-1 hover:bg-red-600 transition">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $image->id }}">
                        <button type="submit" class="text-red-600 hover:text-white text-lg font-bold">&times;</button>
                    </form>

                    <a href="{{ route('image.show', $image->id) }}">
                        <img src="{{ asset($image->image_path) }}" alt="Uploaded Image"
                             class="h-64 w-full object-cover transition-opacity duration-300 opacity-0"
                             loading="eager"
                             onload="this.style.opacity='1'" />
                    </a>

                    <div class="p-2 text-sm text-gray-600 break-words">
                        {{ asset('uploads/' . $image->image_name) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

{{-- ✅ Property Images --}}
@foreach($images as $image)
    @if($image->property)
        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            <img src="{{ asset('storage/' . $image->path) }}" alt="Image"
                 class="w-full h-64 object-cover rounded transition-opacity duration-300 opacity-0"
                 loading="eager"
                 onload="this.style.opacity='1'" />
            <h3 class="text-xl font-semibold mt-2">{{ $image->property->title }}</h3>
            <p class="text-gray-600">{{ $image->property->description }}</p>
        </div>
    @endif
@endforeach

@push('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    #uploadStatus {
        font-size: 1rem;
    }

    .card button {
        font-size: 1rem;
        line-height: 1;
    }

    img[loading] {
        background-color: #f3f3f3;
        display: block;
    }
</style>
@endpush

@endsection
