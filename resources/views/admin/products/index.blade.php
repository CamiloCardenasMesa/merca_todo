<x-app-layout>
    <x-slot name="header">
        <form action="{{ route('admin.products.index') }}" method="GET">
            <x-input type="text" name="query" placeholder="{{ trans('placeholders.dashboard_search') }}"  />
            <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
        </form>
    </x-slot>

    <div class="pt-6 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('product-create')
            <div class="mb-6">
                <x-button-link href="{{ route('admin.products.create') }}">
                    {{ trans('buttons.create_product') }}</x-button>
            </div>
            @endcan
            <div>
                <x-auth-session-status :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300">{{ trans('products.image') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('products.name') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('products.price') }}</th>
                                @can('product-list')
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.show') }}</th>   
                                @endcan
                                @can('product-edit')
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.edit') }}</th>   
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.state') }}</th>
                                @endcan
                                @can('product-delete')
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        @foreach ($products as $product)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 text text-center"> 
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                            width="150px" 
                                            alt="image">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $product->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $product->price }}</td>
                                    @can('product-list')
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('admin.products.show', $product) }}">
                                                {{ trans('buttons.show') }}</x-button-link>
                                        </td>
                                    @endcan
                                    @can('product-edit')
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('admin.products.edit', $product) }}">
                                                {{ trans('buttons.edit') }}</x-button-link>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-auth-validation-errors :errors="$errors" />
                                            <form action="{{ route('admin.products.toggle', $product) }}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <x-button type="submit">
                                                    {{ $product->enable ?  trans('buttons.disable') : trans('buttons.enable') }}
                                                </x-button>
                                            </form>
                                        </td>
                                    @endcan
                                    @can('product-delete')
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <x-button
                                                onclick="return confirm ('{{ trans('products.delete') }}')">
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
