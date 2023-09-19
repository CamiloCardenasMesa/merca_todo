<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('navigation.dashboard') }}
        </div>
    </x-slot>
    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-9">
            <div class="p-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-green-300">1</div>
                <div class="bg-red-300">2</div>
                <div class="bg-blue-300">3</div>
            </div>
        </div>
    </div>
</x-app-layout>
