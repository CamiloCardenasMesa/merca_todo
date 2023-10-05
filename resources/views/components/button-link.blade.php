<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-[#212130] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-green-400 focus:ring ring-green-400 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>