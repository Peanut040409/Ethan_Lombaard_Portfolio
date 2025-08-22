<x-admin-layout title="Admin | Dashboard">
    <div class="text-center">
        <h1 class="md:text-4xl font-bold p-4 text-black dark:text-white">{{ $quote }}</h1>
        <h1 class="md:text-4xl font-bold p-3 text-black dark:text-white">Database size:</h1>
        <h2 class="md:text-3xl font-bold p-2 text-black dark:text-white" >{{ $databaseSize }}</h2>
        <h1 class="md:text-4xl font-bold p-3 text-black dark:text-white ">Total posts:</h1>
        <h2 class="md:text-3xl font-bold p-2 text-black dark:text-white">{{ $postCount }}</h2>
    </div>
</x-admin-layout>
