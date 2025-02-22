<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMind @yield('title', '')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100">

    <header>
        <nav class="bg-gray-900 text-white p-6">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <a href="{{ route('questions.index') }}" class="text-white text-2xl font-bold">LocalMind</a>
                <div class="hidden md:flex space-x-4">
                    <span class="text-white mr-5">{{ Session::get('full_name') }}</span>
                    <a href="{{ route('questions.index') }}" class="text-white hover:text-gray-300">Questions</a>
                    <a href="{{ route('logout') }}" class="text-white hover:text-gray-300">Logout</a>
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>

</body>
</html>