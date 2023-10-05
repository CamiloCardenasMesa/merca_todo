@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-x-2 p-2 rounded-md bg-gray-700 text-green-500 transition duration-150 ease-in-out'
            : 'flex items-center gap-x-2 p-2 rounded-md hover:bg-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
