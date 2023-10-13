<div class="flex flex-grow flex-col">
    <x-label for="{{ $name }}">
        {{ $label }}
    </x-label>
    
    @if (isset($value))
        <x-input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" />
    @else
        <x-input type="{{ $type }}" name="{{ $name }}" />
    @endif
</div>

