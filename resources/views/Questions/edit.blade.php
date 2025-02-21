@extends('layouts.app')


@section('title', '| Edit Question')

@section('content')
<div class="container mx-auto p-4 max-w-xl pt-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Edit an Existing Question</h1>
    
    <form method="POST" action="{{ route('questions.update') }}">
        @csrf

        <!-- Question Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Question Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $question->title }}" required>
        </div>

        <!-- Question Content -->
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Question Content</label>
            <textarea name="content" id="content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ $question->content }}</textarea>
        </div>

        <!-- Question Location -->
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Question Location</label>
            
            <!-- Location input and Geolocation button -->
            <div class="flex items-center">
                <input type="text" name="location" id="location" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $question->location }}" placeholder="Enter location or use geolocation" required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Edit Question</button>
        </div>
    </form>
</div>

@endsection
