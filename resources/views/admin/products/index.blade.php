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
                <div class="grid grid-cols-1 items-center md:grid-cols-1 lg:grid-cols-2 gap-2">
                    <x-search-bar route="{{ route('admin.products.index') }}" placeholder="{{ trans('placeholders.welcome_search') }}"/>
                    <div class="flex gap-2 justify-start md:justify-start lg:justify-end">
                        @can(App\Constants\Permissions::PRODUCT_CREATE)
                            <x-button-actions 
                                route="{{ route('admin.products.create') }}"
                                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />'
                            /> 
                        @endcan
                        @can(App\Constants\Permissions::PRODUCT_EDIT)
                            {{-- <x-button-actions
                                route="{{ route('admin.products.import') }}" 
                                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />' 
                            /> --}}
                            <x-button-actions
                                route="{{ route('admin.products.export') }}" 
                                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />' 
                            />                              
                        @endcan
                    </div>
                </div>
                <div class="overflow-auto">
                    <table class="container mt-3">
                        <thead>
                            <tr class="bg-gray-200 text-left border-y border-gray-300 text-gray-600">
                                <th class="border-b border-gray-300 px-6 lg:px-6 py-2">{{ trans('products.image') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.name') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.price') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.category') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.stock') }}</th>
                                @can(App\Constants\Permissions::PRODUCT_SHOW)
                                    <th class="border-b border-gray-300 px-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <th class="border-b border-gray-300 px-2">{{ trans('buttons.edit') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_DELETE)
                                    <th class="border-b border-gray-300 px-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <th class="border-b border-gray-300 px-2">{{ trans('buttons.state') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                                    <td class="border-b pl-6 py-4 w-1/12">
                                        <img class="rounded-full h-16 w-16" src="{{ asset('storage/' . $product->image) }}" alt="image">
                                    </td>
                                    <td class="border-b px-4 w-1/4">{{ ucwords($product->name) }}</td>
                                    <td class="border-b px-4">${{ $product->price }}</td>
                                    <td class="border-b px-4">{{ $product->category->name }}</td>
                                    <td class="border-b px-4">{{ $product->stock }}</td>

                                    @can(App\Constants\Permissions::PRODUCT_SHOW)
                                        <td class="border-b px-2">
                                            <x-show-button route="{{ route('admin.products.show', $product) }}" />
                                        </td>                               
                                    @endcan
                                    @can(App\Constants\Permissions::PRODUCT_EDIT)
                                        <td class="border-b px-2">
                                            <x-edit-button route="{{ route('admin.products.edit', $product) }}" />
                                        </td>                                    
                                    @endcan
                                    @can(App\Constants\Permissions::PRODUCT_DELETE)
                                        <td class="border-b px-2">
                                            <x-delete-button route="{{ route('admin.products.destroy', $product) }}" textConfirm="return confirm('{{ trans('products.delete') }}')" />
                                        </td>                                    @endcan    
                                    @can(App\Constants\Permissions::PRODUCT_EDIT)
                                        <td class="border-b px-2">
                                            <x-toggle-button route="{{ route('admin.products.toggle', $product) }}" status="{{ $product->enable ? 'checked' : '' }}" />
                                        </td>                                   
                                     @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <x-search-failure
                    search-failure-text="{{ trans('products.search_failure') }}"  
                    back-button-text="{{ trans('buttons.back') }}"
                    route="{{ route('admin.products.index') }}"
                />
            @endif
        </div>
    </x-article-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        {{ $products->links() }}
    </div>      
</x-app-layout>
