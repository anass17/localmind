@extends('layouts.app')

@section('title', '| Question Details')

@section('content')

    <div class="container mx-auto max-w-[1250px] my-10 p-6 bg-white shadow-lg rounded-md grid grid-cols-2">
       <div class="border-r border-gray-300 pr-5">
            <h1 class="text-4xl font-semibold text-blue-500 mb-2">{{ $question->title }}</h1>
            <div class="flex items-center gap-2 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l293.1 0c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1l-91.4 0zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg>
                <span>{{ $author->full_name }}</span>
            </div>
            <div class="flex gap-4 mt-1 mb-5">
                <p class="text-gray-500 text-sm flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                    {{ $question->created_at->format('F j, Y') }}
                </p>
                <p class="text-gray-500 text-sm flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    {{ $question->location }}
                </p>
            </div>
            <p class="text-gray-600 text-lg mb-8">{{ $question->content }}</p>
            <div class="flex gap-7 items-center">
                <button type="button" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-700" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                    <span>0</span>
                </button>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-700" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M272 384c9.6-31.9 29.5-59.1 49.2-86.2c0 0 0 0 0 0c5.2-7.1 10.4-14.2 15.4-21.4c19.8-28.5 31.4-63 31.4-100.3C368 78.8 289.2 0 192 0S16 78.8 16 176c0 37.3 11.6 71.9 31.4 100.3c5 7.2 10.2 14.3 15.4 21.4c0 0 0 0 0 0c19.8 27.1 39.7 54.4 49.2 86.2l160 0zM192 512c44.2 0 80-35.8 80-80l0-16-160 0 0 16c0 44.2 35.8 80 80 80zM112 176c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-61.9 50.1-112 112-112c8.8 0 16 7.2 16 16s-7.2 16-16 16c-44.2 0-80 35.8-80 80z"/></svg>
                    <span>0</span>
                </div>
            </div>
            <form action="{{ route('answers.store') }}" method="POST" class="mt-5 border-t border-gray-300 pt-3">
                @csrf

                <input type="hidden" name="question_id" value="{{ $question->id }}">

                <label for="content" class="mb-2 block font-semibold">Answer</label>

                <textarea name="content" id="answer" placeholder="Write your answer here ..." class="placeholder:text-gray-500 w-full h-24 rounded border outline-none bg-blue-100 border-blue-300 px-3 py-2"></textarea>
                
                @error('data')
                    <p class="text-red-500 py-4">
                        {{ $message }}
                    </p>
                @enderror
                
                <button type="submit" class="px-6 py-2 mt-2 rounded bg-blue-600 text-white">Submit</button>
            </form>
       </div>
       <div class="">
            <p class="text-gray-600 text-center mt-5">No one has answered to this question yet</p>
       </div>
    </div>

@endsection