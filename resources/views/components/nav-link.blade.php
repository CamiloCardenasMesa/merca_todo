@props(['active'])

@php
$classes = ($active ?? false)
            ? 'grid grid-cols-12 content-center p-2 rounded-md shadow-md bg-primary-blue border border-medium-blue text-white transition duration-150 ease-in-out'
            : 'grid grid-cols-12 content-center p-2 rounded-md shadow-md border border-medium-blue text-medium-blue hover:bg-primary-yellow transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
