@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-x-2 p-2 rounded-md shadow-md bg-primary-blue border border-medium-blue text-white transition duration-150 ease-in-out'
            : 'flex items-center gap-x-2 p-2 rounded-md shadow-md border border-medium-blue text-medium-blue hover:bg-primary-yellow transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
