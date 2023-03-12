<x-app-layout>
    <x-slot name="header">
        <a href="{{route('todo_items.create')}}"
           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            Add new
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-start gap-4">

            @if($todo_items->count() > 0)
                @foreach($todo_items as $todo_item)
                    <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg basis-1/4 rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $todo_item->title }}</h3>
                            <p>{{ $todo_item->body }}</p>
                            <p class="mt-4 text-xs">Added at: {{ $todo_item->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                            <div class="md:col-span-1">
                                <a href="{{ route('todo_items.edit', $todo_item) }}"
                                   class="inline-flex justify-center rounded-md border border-transparent
                                       bg-orange-400 py-2 px-4 text-sm font-medium text-white shadow-sm
                                       hover:bg-orange-700 focus-outline-none"
                                >Edit</a>
                                <form method="POST" action="{{route('todo_items.done', $todo_item)}}"
                                class="inline-flex justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="inline-flex justify-center rounded-md border border-transparent
                                       bg-orange-400 py-2 px-4 text-sm font-medium text-white shadow-sm
                                       hover:bg-orange-700 focus-outline-none"
                                    >Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
