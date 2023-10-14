<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center pr-3 pl-4 py-2 bg-[#212130] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-green-400 focus:ring ring-green-400 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
    <div class="ml-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
</button>
