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
                            <tr class="bg-gray-100 text-left border border-gray-300">
                                <th class="border-b border-gray-300 lg:px-4 py-2 text-center px-6">{{ trans('products.image') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.name') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.price') }}</th>
                                <th class="border-b border-gray-300 px-4 py-2">{{ trans('products.category') }}</th>
                                @can(App\Constants\Permissions::PRODUCT_SHOW)
                                    <th class="border-b border-gray-300 px-4 py-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <th class="border-b border-gray-300 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                    <th class="border-b border-gray-300 px-4 py-2">{{ trans('buttons.state') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_DELETE)
                                    <th class="border-b border-r border-gray-300 px-4 py-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="even:bg-gray-100 odd:bg-white">
                                    <td class="border-b pl-6 py-4">
                                        <img class="rounded-full h-16 w-16" src="{{ asset('storage/' . $product->image) }}" alt="image">
                                    </td>
                                    <td class="border-b px-4 w-1/4">
                                        {{ ucwords($product->name) }}
                                    </td>
                                    <td class="border-b px-4">
                                        $ {{ $product->price }}
                                    </td>
                                    <td class="border-b px-4">
                                        {{ $product->category->name }}
                                    </td>
        
                                    @can(App\Constants\Permissions::PRODUCT_SHOW)
                                    <td class="border-b borde px-4">
                                        <x-button-link href="{{ route('admin.products.show', $product) }}">
                                            {{ trans('buttons.show') }}
                                        </x-button-link>
                                    </td>
                                    @endcan
        
                                    @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <td class="border-b px-4">
                                        <x-button-link href="{{ route('admin.products.edit', $product) }}">
                                            {{ trans('buttons.edit') }}
                                        </x-button-link>
                                    </td>
                                    <td class="border-b px-4">
                                        <form action="{{ route('admin.products.toggle', $product) }}" method="POST">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <x-button type="submit">
                                                {{ $product->enable ? trans('buttons.disable') : trans('buttons.enable') }}
                                            </x-button>
                                        </form>
                                    </td>
                                    @endcan
        
                                    @can(App\Constants\Permissions::PRODUCT_DELETE)
                                    <td class="border-b border-r px-4">
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <x-button onclick="return confirm ('{{ trans('products.delete') }}')">
                                                {{ trans('buttons.delete') }}
                                            </x-button>
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
