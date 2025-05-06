{{-- resources/views/image/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Image Details')

@section('content')
    <div class="container mx-auto py-10">
        <div class="flex flex-col items-center">
            {{-- Main Image --}}
            <img src="{{ asset($image->image_path) }}" alt="Image" class="w-full max-w-lg h-auto rounded-lg shadow-lg" />

            {{-- Image Title and Description --}}
            <div class="mt-6 text-center">
                <h2 class="text-2xl font-bold">{{ $image->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $image->description }}</p>
            </div>

            {{-- Related Images Section --}}
            <div class="mt-10">
                <h3 class="text-xl font-bold mb-4">Related Images</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedImages as $relatedImage)
                        <div class="card bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                            <a href="{{ route('image.show', $relatedImage->id) }}">
                                <img src="{{ asset($relatedImage->image_path) }}" alt="Related Image" class="w-full h-64 object-cover rounded-lg" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Image Details as You Scroll --}}
            <div class="mt-10">
                <h3 class="text-xl font-bold mb-4">More Details</h3>
                <p>{{ $image->description }}</p>
                <!-- You can add more details here like tags, user information, etc. -->
            </div>
        </div>
    </div>
@endsection
