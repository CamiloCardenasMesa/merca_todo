<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('navigation.dashboard') }}
        </div>
    </x-slot>

    <x-article-layout>
        <div class="bg-green-300">1</div>
        <div class="bg-red-300">2</div>
        <div class="bg-blue-300">3</div>
    </x-article-layout>
</x-app-layout>
