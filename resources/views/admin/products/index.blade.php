<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.product_list') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <form action="{{ route('admin.products.index') }}" method="GET">
                                <x-input type="text" name="query" placeholder="{{ trans('placeholders.welcome_search') }}" />
                                <x-button>{{ trans('buttons.search') }}</x-button>
                            </form>
                        </div>
                        <div>
                            @can(App\Constants\Permissions::PRODUCT_CREATE)
                            <x-button-link href="{{ route('admin.products.create') }}">{{ trans('buttons.create_product') }}</x-button-link>
                            @endcan
                            
                            @can(App\Constants\Permissions::PRODUCT_EDIT)
                            <x-button-link href="{{ route('admin.products.import') }}">{{ trans('buttons.import_products') }}</x-button-link>
                            <x-button-link href="{{ route('admin.products.export') }}">{{ trans('buttons.export_products') }}</x-button-link>
                            @endcan
                        </div>
                    </div>
                    <table class="container mt-8">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300">{{ trans('products.image') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('products.name') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('products.price') }}</th>
                                @can(App\Constants\Permissions::PRODUCT_LIST)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.state') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::PRODUCT_DELETE)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        @foreach ($products as $product)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 text text-center">
                                        <div class="flex items-center justify-center  w-full">
                                            <img width="120px" src="{{ asset('storage/' . $product->image) }}" alt="image">
                                        </div>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        {{ ucwords($product->name) }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        {{ $product->price }}
                                    </td>

                                    @can(App\Constants\Permissions::PRODUCT_LIST)
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.products.show', $product) }}">
                                            {{ trans('buttons.show') }}
                                        </x-button-link>
                                    </td>
                                    @endcan

                                    @can(App\Constants\Permissions::PRODUCT_EDIT)
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.products.edit', $product) }}">
                                            {{ trans('buttons.edit') }}
                                        </x-button-link>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
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
                                    <td class="border border-gray-300 px-4 py-2 text-center">
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
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
