<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ノート編集
        </h2>
    </x-slot>

    <div class="container mx-auto px-8 my-3">
        <form class="form" action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3"
                    type="submit" value="保存する">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="title" type="text" value="{{ old('title', $note->title) }}">
            </div>
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="body" name="body">{{ old('body', $note->body) }}</textarea>
        </form>
    </div>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        $(document).ready(function () {
            var simplemde = new SimpleMDE({element: document.getElementById("body")});
        });
    </script>
</x-app-layout>
