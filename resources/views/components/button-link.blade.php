<a {{ $attributes->merge(['class' => 'inline-flex items-center pl-3 pr-4 py-2 bg-primary-blue border-2 border-medium-blue rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-yellow hover:text-medium-blue hover:border-medium-blue transition ease-in-out duration-300']) }}>
    <div class="mr-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    {{ $slot }}
</a>