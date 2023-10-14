@props(['name', 'type', 'label', 'value', 'fieldsNonRequired', 'message', 'options', 'option'])

@php
    $commonClasses = "rounded-md border-gray-200 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50";
    $fieldsNonRequired = [ 
        'category_id',
        'phone', 
        'address',
        'birthday',
        'city',
        'country',
        'role',
    ];
@endphp

<div class="flex flex-grow flex-col">
    <x-label for="{{ $name }}">
        {{ $label }}
        @if(!in_array($name, $fieldsNonRequired))
            *
        @endif
    </x-label>

    @switch($type)
        @case('select')
            <select class="{{ $commonClasses }}" name="{{ $name }}" id="{{ $name }}">
                @foreach ($options as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            @break
        @case('file')
            <input class="{{ $commonClasses }} file:rounded-md file:shadow-sm file:border-gray-200 cursor-pointer" name="{{ $name }}" id="{{ $name }}" type="{{ $type }}" required />
            @break
        @case('textarea')
            <textarea class="{{ $commonClasses }}" rows="1" name="{{ $name }}" id="{{ $name }}">
                {{ old($name) }}
            </textarea>
            @break
        @default
            <x-input class="{{ $commonClasses }}" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" />
    @endswitch

    @error($name)
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>


