<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   Hey, {{ Auth::user()->name }}
                    {{ __("You're logged in!") }}
                </div>
                <a href="{{ url('/product') }}" class="text-lg text-blue-700 dark:text-gray-500 underline">All Products</a>
                <a href="{{ route('category.index') }}" class="text-lg text-blue-700 dark:text-gray-500 underline">All Categories</a>

            </div>
        </div>
    </div>
</x-app-layout>
