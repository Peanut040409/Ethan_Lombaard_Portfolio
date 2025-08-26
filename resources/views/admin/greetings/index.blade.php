<x-admin-layout title="Admin | Greetings">
    <div class="flex justify-center h-full p-4">
        <div class="flex flex-col justify-start w-[80%] md:w-[60%] border border-gray-400 dark:border-white h-full overflow-y-auto" id="scrollableDiv">
            @foreach($greetings as $greeting)
                <div x-data="{ edit:false }" class="flex border border-gray-400 dark:border-white rounded p-1 m-1">
                    <div class="flex-1" x-show="!edit">
                        <h1 class="text-2xl"> {{ $greeting->greeting }} </h1>   
                        <h2 class="text-sm"> {{ $greeting->language }} </h2>
                    </div>

                    <div x-show="edit" class="flex-1">
                        <form action="{{ route('admin.greetings.update', $greeting->id) }}" method="POST" id="editForm{{ $greeting->id }}" x-cloak>
                            @csrf
                            @method('PUT')
                            <input type="text" name="greeting" value="{{ $greeting->greeting }}" class="border rounded p-1 w-1/2 bg-white dark:bg-gray-800">
                            <input type="text" name="language" value="{{ $greeting->language }}" class="border rounded p-1 w-1/2 bg-white dark:bg-gray-800 ">
                        </form>
                    </div>


                    <div class="flex justify-end flex-1">
                        <button x-show="!edit" @click="edit = true" class="inline-flex w-10 justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button x-show="edit" @click="edit = false" type="submit" form="editForm{{ $greeting->id }}" x-cloak class="inline-flex w-10 justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        <form action="{{ route('admin.greetings.destroy', $greeting->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="flex justify-center w-[100%]" x-data="{ create:false }" >
                <button type="submit" x-show="!create" @click="create = true" id="creationButton">
                    <svg class="w-8 h-8 md:w-12 md:h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <div class="flex border border-gray-400 dark:border-white rounded p-1 m-1 w-[100%]" x-show="create" x-cloak>
                    <div class="flex-1">
                        <form action="{{ route('admin.greetings.store') }}" method="POST" x-cloak class="flex">
                            <div class="flex flex-col flex-1">
                                @csrf
                                @method('POST')
                                <input type="text" name="greeting" class="border rounded p-1 w-1/2 bg-white dark:bg-gray-800" value="">
                                <label for="greeting">Greeting</label>
                                <input type="text" name="language" class="border rounded p-1 w-1/2 bg-white dark:bg-gray-800" value="">
                                <label for="language">Language</label>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="justify-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <script>
            var objDiv = document.getElementById("scrollableDiv");
            function ScrollToBottomOfScrollableDiv() {
                objDiv.scrollTop = objDiv.scrollHeight;
            }
        </script>
        <button class="relative" onclick="ScrollToBottomOfScrollableDiv()">
            <div class="absolute right-4 bottom-2 text-green-800 rounded-full p-2 md:dark:hover:text-white transition md:hover:text-black transition" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
        </div>
        </button>
    </div>
</x-admin-layout>