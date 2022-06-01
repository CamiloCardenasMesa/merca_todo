<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucwords($product->name) }}
        </h2>
    </x-slot>

    
    <div class="py-12 min-h-screen bg-gray-100">
        <div>
            <x-auth-session-status :status="session('status')" />
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 bg-white  border-gray-200">
                <table class="container">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.image') }}</th>
                            <th class="border border-gray-300 px-4 py-2">Id</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.name') }}</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.description') }}</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.price') }}</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.stock') }}</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.category') }}</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.created_at') }}</th>
                            <th class="border border-gray-300 px-4 py-2">{{ trans('products.updated_at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center"><img src="{{ asset('storage/' .$product->image) }}" alt="image"></td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $product->id }}</th>
                            <td class="border border-gray-300 px-4 py-2 text-left">{{ ucwords($product->name) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-left">{{ $product->description }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $product->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $product->stock }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $product->category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-left">{{ $product->created_at }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-left">{{ $product->updated_at }}</td>
                        </tr>
                    </tbody>
                </table><br>
                    <div class="flex justify-center">
                        <a href="{{route('admin.products.index')}}"> <x-button>{{ trans('buttons.back') }}</x-button>
                    </div> 
            </div>
        </div>
    </div>  
</x-app-layout>