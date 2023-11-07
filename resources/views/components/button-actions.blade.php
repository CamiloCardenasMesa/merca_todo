@props(['route', 'svgPath', 'text'])

<a href="{{ $route }}">
    <div class="inline-flex group p-2 border-2 shadow border-medium-blue rounded-xl hover:bg-dark-blue text-medium-blue hover:text-white hover:border-white transition-all">
        <span class="hidden group-hover:inline-block px-1">{{ $text }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            {!! $svgPath !!}
        </svg>
    </div>
</a>