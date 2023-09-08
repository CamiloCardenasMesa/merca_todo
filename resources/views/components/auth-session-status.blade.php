@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'flex px-8 pb-2 items-center bg-gray-100 font-oswald text-2xl tracking-wide font-medium text-center shadow-sm border border-green-500 rounded-md text-md text-green-600']) }}>
        {{ $status }}
    </div>
@endif
