@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'bg-green-500 font-medium text-center border rounded-md text-md text-white mb-4 p-2']) }}>
        {{ $status }}
    </div>
@endif
