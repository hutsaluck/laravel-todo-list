<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create todo item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg basis-1/4">
                @if ($errors->any())
                    <div class="alert alert-danger text-sm text-red-600 dark:text-red-400 space-y-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('todo_items.store') }}" method="POST">
                    @csrf
                    <div class="m:px-2 lg:px-6 sm:my-2 lg:my-4">
                        <label for="title"
                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                            Title
                        </label>
                        <input type="text"
                               class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                               placeholder="Title here"
                                name="title">
                    </div>

                    <div class="m:px-2 lg:px-6 sm:my-2 lg:my-4">
                        <label for="title"
                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                            What todo?
                        </label>
                        <textarea
                               class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                               focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
                               dark:focus:ring-indigo-600 rounded-md shadow-sm" name="body"></textarea>
                    </div>

                    <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                        <div class="md:col-span-1">
                            <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200
                            border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800
                            uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white
                            active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500
                            focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            >
                                {{ "Create" }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

