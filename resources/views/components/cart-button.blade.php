<a {{ $attributes->merge(['class' => 'inline-flex items-center p-2 border border-transparent rounded-md text-white font-oswald font-extrabold uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-green-400 focus:ring ring-green-400 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
      </svg>
    {{ $slot }}
</a>