@extends('layouts.app')


@section('title', '| Create Question')

@section('content')
<div class="container mx-auto p-4 pt-8 max-w-xl">
    <h1 class="text-2xl font-bold mb-6 text-center">Create a New Question</h1>
    
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf

        <!-- Question Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Question Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Title" required>
        </div>

        <!-- Question Content -->
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Question Content</label>
            <textarea name="content" id="content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Content" required></textarea>
        </div>

        <!-- Question Location -->
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Question Location</label>
            
            <select name="location" id="location" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Select a city</option>
                @foreach ($moroccanCities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Post Question</button>
        </div>
    </form>
</div>

@endsection
