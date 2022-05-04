@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => ' bg-gray-800 font-medium text-center border border-transparent rounded-md text-md text-white mb-4 p-2']) }}>
        {{ $status }}
    </div>
@endif
