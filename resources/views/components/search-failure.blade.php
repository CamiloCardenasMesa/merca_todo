<div class="bg-gray-100 p-6 grid justify-center text-center gap-3">
    <div class="text-gray-800 text-lg">
        {{ $searchFailureText }}
    </div>
    <div>
        <x-button-link href="{{ $route }}">
            {{ $backButtonText }}
        </x-button-link>
    </div>
</div>