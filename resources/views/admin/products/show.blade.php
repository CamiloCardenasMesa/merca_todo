<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->name) }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 bg-white  border-gray-200">
                <table class="container">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-400 px-4 py-2">imagen</th>
                            <th class="border border-gray-400 px-4 py-2">Id</th>
                            <th class="border border-gray-400 px-4 py-2">Nombre</th>
                            <th class="border border-gray-400 px-4 py-2">Descripción</th>
                            <th class="border border-gray-400 px-4 py-2">Precio</th>
                            <th class="border border-gray-400 px-4 py-2">Stock</th>
                            <th class="border border-gray-400 px-4 py-2">Categoría</th>
                            <th class="border border-gray-400 px-4 py-2">Fecha de creación:</th>
                            <th class="border border-gray-400 px-4 py-2">Fecha de actualización:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-400 px-4 py-2 text-center"><img src="{{ asset('storage/' .$product->image) }}" alt="image"></td>
                            <td class="border border-gray-400 px-4 py-2 text-center">{{ $product->id }}</th>
                            <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->name }}</td>
                            <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->description }}</td>
                            <td class="border border-gray-400 px-4 py-2 text-center">{{ $product->price }}</td>
                            <td class="border border-gray-400 px-4 py-2 text-center">{{ $product->stock }}</td>
                            <td class="border border-gray-400 px-4 py-2 text-center">{{ $product->category->name }}</td>
                            <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->created_at }}</td>
                            <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->updated_at }}</td>
                        </tr>
                    </tbody>
                </table><br>
                    <div class="flex justify-center">
                        <a href="{{route('admin.products.index')}}"> <x-button>Volver</x-button>
                    </div> 
            </div>
        </div>
    </div>  
</x-app-layout>