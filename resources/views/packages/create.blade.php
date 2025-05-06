@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Add Travel Package</h2>
    <form action="{{ route('packages.store') }}" method="POST">
        @csrf
        <input name="title" class="w-full mb-4 p-2 border rounded" placeholder="Title" required>
        <input name="price" class="w-full mb-4 p-2 border rounded" placeholder="Price" required>
        <textarea name="desc" class="w-full mb-4 p-2 border rounded" placeholder="Description" required></textarea>
        <input name="image" class="w-full mb-4 p-2 border rounded" placeholder="Image URL" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Package</button>
    </form>
</div>
@endsection




