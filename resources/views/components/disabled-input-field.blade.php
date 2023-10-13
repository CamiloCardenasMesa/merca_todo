@props(['name', 'label', 'value'])

<div class="flex flex-col">
    <x-label for="{{ $name }}">
        {{ $label }}
    </x-label>
    <x-input id="{{ $name }}" value="{{ $value }}" disabled />
</div>