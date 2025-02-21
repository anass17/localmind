@extends('layouts.app')

@section('title', '| Questions')

@section('content')
<div class="flex min-h-screen">

    <div class="w-1/4 p-6 bg-white border-r border-gray-300" >
        <h2 class="text-xl font-semibold mb-4">Filter & Sort</h2>

        <!-- Search -->
        <form action="{{ route('questions.index') }}" method="GET" class="mb-6">
            <input type="text" name="search" placeholder="Search..." class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{ request('search') }}">
        </form>

        <!-- Filter by City -->
        <form action="{{ route('questions.index') }}" method="GET" class="mb-6">
            <label for="city" class="block mb-2 text-sm font-medium text-gray-700">City</label>
            <select name="city" id="city" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="">All Cities</option>
                <option value="New York" {{ request('city') == 'New York' ? 'selected' : '' }}>New York</option>
                <option value="Los Angeles" {{ request('city') == 'Los Angeles' ? 'selected' : '' }}>Los Angeles</option>
                <option value="Chicago" {{ request('city') == 'Chicago' ? 'selected' : '' }}>Chicago</option>
                <!-- Add more cities as necessary -->
            </select>
        </form>

        <!-- Sort by Date or Distance -->
        <form action="{{ route('questions.index') }}" method="GET">
            <div class="flex justify-between items-center mb-6">
                <label for="sort_by" class="text-sm font-medium text-gray-700">Sort By</label>
                <select name="sort_by" id="sort_by" class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="date" {{ request('sort_by') == 'date' ? 'selected' : '' }}>Date (Newest)</option>
                    <option value="distance" {{ request('sort_by') == 'distance' ? 'selected' : '' }}>Distance</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Apply Filters</button>
        </form>
    </div>

    <div class="w-3/4 px-10 py-8">
        <h1 class="text-3xl font-bold mb-10 text-center">View Questions</h1>

        @foreach($questions as $question)

            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6 p-6 border">
                <h2 class="text-2xl font-semibold text-blue-500"><a href="/questions/{{ $question->id }}">{{ $question->title }}</a></h2>
                <div class="flex gap-4 mt-1">
                    <p class="text-gray-500 text-sm flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                        {{ $question->created_at->format('F j, Y') }}
                    </p>
                    <p class="text-gray-500 text-sm flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                        {{ $question->location }}
                    </p>
                </div>
                <p class="text-gray-600 mt-3">{{ \Illuminate\Support\Str::limit($question->content, 150) }}</p>
            </div>

        @endforeach

    </div>
</div>
@endsection
