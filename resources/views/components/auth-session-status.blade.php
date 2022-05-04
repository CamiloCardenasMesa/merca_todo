@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => ' font-medium text-md text-green-600 mb-4']) }}>
        {{ $status }}
    </div>
@endif
