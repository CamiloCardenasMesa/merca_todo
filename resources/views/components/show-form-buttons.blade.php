<div class="flex items-center justify-start mt-6 gap-3">
    <x-button-link href="{{ $route }}">
        {{ trans('buttons.back') }}
    </x-button-link>
    {{ $slot }}
</div>