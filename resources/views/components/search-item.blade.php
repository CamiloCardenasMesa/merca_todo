<form class="flex items-center" action="{{ $route }}" method="GET">
    <input class="rounded-l-md border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="query" placeholder="{{ $placeholder }}" />
    <button type="submit" class="inline-flex bg-white p-2 my-2 border border-gray-300 rounded-r-md shadow-sm transition-all duration-300 text-gray-500 hover:text-white hover:bg-green-500 hover:border-indigo-300 hover:ring hover:ring-indigo-200 focus:ring-opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </button>
</form>