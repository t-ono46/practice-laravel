<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ノート一覧
        </h2>
    </x-slot>

    <div class="container mx-auto px-8 my-3">
        <button
            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3"
            onclick="location.href='{{route('notes.create')}}'">
            Create
        </button>

        <table class="min-w-full">
            <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Title
                </th>
                <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50 w-1/12"
                    colspan="2">
                    Action
                </th>
            </tr>
            </thead>

            <tbody class="bg-white">
            @foreach($notes as $note)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">
                            {{ $note->title }}
                        </div>
                    </td>

                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                        <a href="{{ route('notes.edit', $note->id) }}"
                           class="text-gray-400 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>

                    </td>
                    <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                        <form action="{{ route('notes.destroy',$note->id) }}" method="POST"
                              onsubmit="return confirm('{{ trans('are You Sure ? ') }}');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
