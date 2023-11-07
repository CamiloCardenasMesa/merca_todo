@props(['name', 'label', 'fieldsNonRequired', 'value', 'type', 'message'])

@php
    $fieldsNonRequired = [ 
        'category_id',
        'phone', 
        'address',
        'birthday',
        'city',
        'country',
    ];
@endphp

<div class="flex flex-grow flex-col">
    <x-label for="{{ $name }}">
        {{ $label }}
        @if(!in_array($name, $fieldsNonRequired))
            *
        @endif
    </x-label>
    
    @if (isset($value))
        <x-input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" />
    @else
        <x-input type="{{ $type }}" name="{{ $name }}" />
    @endif

    @error($name)
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>

