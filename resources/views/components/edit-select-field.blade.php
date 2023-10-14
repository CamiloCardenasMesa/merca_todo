@props(['id', 'label', 'name'])

<div class="flex flex-grow flex-col">
    <x-label for="{{ $id }}">{{ $label }}</x-label>
    <select id="{{ $id }}" name="{{ $name }}" class="rounded-md border-gray-200 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        {{ $slot }}
    </select>
</div>