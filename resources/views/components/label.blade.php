@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold mb-1 tracking-wide font-oswald text-lg text-gray-800']) }}>
    {{ $value ?? $slot }}
</label>
