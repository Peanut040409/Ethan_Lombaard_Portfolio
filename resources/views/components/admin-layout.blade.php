<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('assets/logo/logo.png') }}" type="image/x-icon">
</head>
<body class="flex flex-col h-screen bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" x-data="{ showScroll: false }" x-init="window.addEventListener('scroll', () => { showScroll = (window.scrollY > 50) })">

    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow relative" id="top">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            
            <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <div class="flex-shrink-0 flex items-center space-x-2">
                    <img class="h-10 w-auto" src="{{ asset('assets/logo/logo.png') }}" alt="Logo">
                    <h1 class="text-lg font-semibold">Admin Dashboard</h1>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('admin.greetings.index') }}"
                    class="hover:text-blue-500 {{ request()->routeIs('admin.greetings.index') ? 'text-blue-500 font-semibold' : '' }}">
                    Greetings
                </a>
                <a href="{{ route('admin.images.index') }}"
                    class="hover:text-blue-500 {{ request()->routeIs('admin.images.index') ? 'text-blue-500 font-semibold' : '' }}">
                    Images
                </a>
                <a href="#" class="hover:text-blue-500">Posts</a>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="hover:text-blue-500">Logout</button></form>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                    <svg class="h-6 w-6" x-show="!open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="h-6 w-6" x-show="open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Mobile Menu -->
                <div x-show="open" x-transition x-cloak class="absolute top-full right-1 mt-2 w-36 bg-white dark:bg-gray-800 shadow-lg rounded-md z-50">
                    <a href="{{ route('admin.greetings.index') }}"
                        class="hover:text-blue-500 {{ request()->routeIs('admin.greetings.index') ? 'text-blue-500 font-semibold' : '' }} block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                        Greetings
                    </a>
                    <a href="{{ route('admin.images.index') }}"
                        class="hover:text-blue-500 {{ request()->routeIs('admin.images.index') ? 'text-blue-500 font-semibold' : '' }} block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                        Images
                    </a>
                    <a href="#" class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">Posts</a>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">Logout</button></form>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="p-4 min-h-[60vh] h-full">
        {{ $slot }}
    </main>

    <a href="#top" x-cloak>
      <svg class="md:w-12 md:h-12 w-8 h-8 fixed right-12 bottom-12 z-[9999] hover:scale-110 transition-transform"
           x-show="showScroll" 
           x-transition
           xmlns="http://www.w3.org/2000/svg"
           fill="none"
           viewBox="0 0 24 24"
           stroke-width="1.5"
           stroke="currentColor">
           <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    </a>



    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Contact Details -->
                <div>
                    <h3 class="font-semibold mb-2">Contact</h3>
                    <ul class="space-y-1">
                        <li>Email: <a href="mailto:ethanlombaard09@gmail.com" class="hover:text-blue-500">ethanlombaard09@gmail.com</a></li>
                        <li>Phone: <a href="tel:+27739115349" class="hover:text-blue-500">+27 73 911 5349</a></li>
                    </ul>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="font-semibold mb-2">Links</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="hover:text-blue-500">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-500">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-blue-500">Gallery</a></li>
                    </ul>
                </div>

                <!-- Empty for spacing/future content -->
                <div>
                    <h3 class="font-semibold mb-2">Support me</h3>
                    <ul class="space-y-1">
                        <li><a href="https://buymeacoffee.com" target="_blank" class="hover:text-blue-500">☕ Buy me a coffee?</a></li>
                    </ul>
                </div>

                <!-- Copyright -->
                <div class="md:text-right">
                    <p>&copy; {{ date('Y') }} Mad Scientist. <br> All rights reserved.</p>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>
