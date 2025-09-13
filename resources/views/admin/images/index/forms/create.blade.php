<x-admin-layout title="Admin | Images | Creation form">
    <div class="flex justify-center">
        <form action="/admin/images" method="POST" class="flex justify-center flex-col">
            @csrf
            <img src="" alt="" id="preview" id="image">
            <label for="image" id="imageLabel"></label>
            <input type="file" name="image" id="imageInput" class="hidden">
            <label for="imageInput" class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Choose file</label>
            <br>
            <button type="submit">Upload</button>
        </form>
        @vite('resources/js/image-handler.js')  
    </div>
</x-admin-layout>
