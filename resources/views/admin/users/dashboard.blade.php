<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex">
                <x-auth-session-status class="mr-2" :status="session('status')" />
            </div>
            <form class="flex justify-between" action="{{ route('welcome') }}" method="GET">
                <x-input type="text" name="query" placeholder="{{ trans('placeholders.welcome_search') }}" />
                <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
            </form>
        </div>
    </x-slot>
    <section >
        <div class="flex flex-grow items-center justify-center bg-gray-300">
            <p>
                Voy a construir el main de la vista dashboard para ver como funcionan los slots para
                replicar en los otros main
            </p>
        </div>
    </section>
</x-app-layout>
