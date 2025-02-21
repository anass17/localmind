@extends('layouts.app')

@section('title', '| Question Details')

@section('content')

    <div class="container mx-auto max-w-[1250px] my-10 p-6 bg-white shadow-lg rounded-md">
        <h1 class="text-4xl font-semibold text-gray-800 mb-2">{{ $question->title }}</h1>
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
        <p class="text-gray-600 text-lg mb-4">{{ $question->content }}</p>
    </div>

@endsection