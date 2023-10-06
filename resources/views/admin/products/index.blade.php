<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.product_list') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <x-article-layout>
        <div class="bg-[#EBEBF1] border-b border-gray-200">
            @if (count($products))
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <form action="{{ route('admin.products.index') }}" method="GET">
                            <x-input type="text" name="query" placeholder="{{ trans('placeholders.welcome_search') }}" />
                            <x-button>{{ trans('buttons.search') }}</x-button>
                        </form>
                    </div>
                    <div class="flex gap-2 justify-between md:justify-start lg:justify-end">
                        @can(App\Constants\Permissions::PRODUCT_CREATE)
                            <x-button-link href="{{ route('admin.products.create') }}">{{ trans('buttons.create_product') }}</x-button-link>
                        @endcan
                        
                        @can(App\Constants\Permissions::PRODUCT_EDIT)
                            <x-button-link href="{{ route('admin.products.import') }}">{{ trans('buttons.import_products') }}</x-button-link>
                            <x-button-link href="{{ route('admin.products.export') }}">{{ trans('buttons.export_products') }}</x-button-link>
                        @endcan
                    </div>
                </div>
                <div class="overflow-auto">
                    <table class="container mt-4">
                        <thead>
                            <tr class="bg-gray-100 text-left border border-gray-300 text-gray-600">
                                <th class="border-b border-gray-300 px-6 lg:px-6 py-2">{{ trans('products.image') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.name') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.price') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.category') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.stock') }}</th>
                                @can(App\Constants\Permissions::PRODUCT_SHOW)
                                    <th class="border-b border-gray-300 px-1 py-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <th class="border-b border-gray-300 px-1 py-2">{{ trans('buttons.edit') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_DELETE)
                                    <th class="border-b border-gray-300 px-1 py-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <th class="border-b border-r border-gray-300 px-1 py-2">{{ trans('buttons.state') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                                    <td class="border-b pl-6 py-4 w-1/12">
                                        <img class="rounded-full h-16 w-16" src="{{ asset('storage/' . $product->image) }}" alt="image">
                                    </td>
                                    <td class="border-b px-4 w-1/4">
                                        {{ ucwords($product->name) }}
                                    </td>
                                    <td class="border-b px-4">
                                        ${{ $product->price }}
                                    </td>
                                    <td class="border-b px-4">
                                        {{ $product->category->name }}
                                    </td>
                                    <td class="border-b px-4">
                                        {{ $product->stock }}
                                    </td>

                                    @can(App\Constants\Permissions::PRODUCT_SHOW)
                                        <td class="border-b px-1">
                                            <a href="{{ route('admin.products.show', $product) }}" class="inline-flex p-2 border border-gray-500 rounded-xl hover:rounded-3xl hover:bg-yellow-500 hover:text-white hover:border-white transition-all duration-300 text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </a>
                                        </td>
                                    @endcan
                                    @can(App\Constants\Permissions::PRODUCT_EDIT)
                                        <td class="border-b px-1">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex p-2 border border-gray-500 rounded-xl hover:rounded-3xl hover:bg-green-500 hover:text-white hover:border-white transition-all duration-300 text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                        </td>
                                    @endcan
                                    @can(App\Constants\Permissions::PRODUCT_DELETE)
                                        <td class="border-b px-1">
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button onclick="return confirm ('{{ trans('products.delete') }}')" class="flex p-2 border border-gray-500 rounded-xl hover:rounded-3xl hover:bg-red-700 hover:text-white hover:border-white transition-all duration-300 text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                      </svg>
                                                </button>
                                            </form>
                                        </td>
                                    @endcan

                                    @can(App\Constants\Permissions::PRODUCT_EDIT)
                                        <td class="border-b px-1">
                                            <form action="{{ route('admin.products.toggle', $product) }}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer" onchange="this.form.submit()" {{ $product->enable ? 'checked' : '' }}>
                                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                                </label>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <x-search-failure
                    :search-failure-text="trans('products.search_failure')"  
                    :back-button-text="trans('buttons.back')"
                    :route="route('admin.products.index')"
                />
            @endif
        </div>
    </x-article-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        {{ $products->links() }}
    </div>      
</x-app-layout>
