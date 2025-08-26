<x-admin-layout title="Admin | Dashboard">
    <div class="text-center">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 opacity-20 -z-10 animate-gradient-x"></div>
        <h1 class="md:text-4xl font-bold p-4 text-black dark:text-white">{{ $quote }}</h1>
        <div class="grid md:grid-cols-2 gap-6 p-6">
          <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Database size</h2>
            <p class="text-3xl font-bold">{{ $databaseSize }}</p>
          </div>
          <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Total posts</h2>
            <p class="text-3xl font-bold">{{ $postCount }}</p>
          </div>
        </div>
    </div>
</x-admin-layout>
