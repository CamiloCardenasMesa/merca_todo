
<x-app-layout>
    <x-slot name="header">
        <form action="{{ route('admin.products.index') }}" method="GET"> 
            <x-input type="text" name="query" placeholder="Buscar instrumento" />
            <x-button class="ml-2">Buscar</x-button>
        </form>
    </x-slot>

    <div class="pt-6 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-button-link href="{{route('admin.products.create')}}">Crear nuevo producto
                </x-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 px-4 py-2">Imagen</th>
                                <th class="border border-gray-400 px-4 py-2">Nombre</th>
                                <th class="border border-gray-400 px-4 py-2">Descripción</th>
                                <th class="border border-gray-400 px-4 py-2">Precio</th>
                                <th class="border border-gray-400 px-4 py-2">Stock</th>
                                <th class="border border-gray-400 px-4 py-2">Ver</th>
                                <th class="border border-gray-400 px-4 py-2">Editar</th>
                                <th class="border border-gray-400 px-4 py-2">Estado</th>
                                <th class="border border-gray-400 px-4 py-2">Eliminar</th>
                            </tr>
                        </thead>  
                        @foreach ($products as $product)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2 text-left"> <img src="{{ asset('storage/' .$product->image) }}" alt="image"></td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->description }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $product->price }}</td> 
                                    <td class="border border-gray-400 px-4 py-2 text-center">{{ $product->stock }}</td> 
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.products.show', $product) }}">Ver</x-button-link>
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.products.edit', $product) }}">Editar</x-button-link>
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-auth-validation-errors :errors="$errors"/>
                                        <form action="{{ route('admin.products.toggle', $product) }}" method="POST"> 
                                            @csrf   
                                            {{ method_field('PUT') }}                                     
                                            <x-button type="submit" >{{ $product->enable ? 'Deshabilitar' : 'Habilitar' }}</x-button>
                                        </form>                             
                                    </td> 
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"> 
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <x-button href="{{ route('admin.products.index', $product) }}" onclick="return confirm ('¿Seguro que quieres eliminar este producto?')">Eliminar</x-button>
                                        </form>                             
                                    </td> 
                                </tr>                                              
                            </tbody>
                        @endforeach
				    </table>
                </div>
            </div>
           {{ $products -> links() }} 
        </div>
    </div>
</x-app-layout>