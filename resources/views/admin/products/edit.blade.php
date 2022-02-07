
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->name) }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-12 py-2 bg-white border-b border-gray-200">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-2">
                        <div class="grid grid-rows-1 gap-1"><br>
                            <x-label for="image">Imagen: </x-label>
                            <x-input id="image" type="file" name="image" value="{{ $product->image }}"/><br>
                            <x-label for="name">Nombre: </x-label>
                            <x-input type="text" name="name" value="{{ $product->name }}" required/><br>                                
                            <x-label for="description">Descripción: </x-label>
                            <x-input type="text" name="description" value="{{ $product->description }}" required/><br>
                            <x-label for="price">Precio: </x-label>
                            <x-input type="text" name="price" value="{{ $product->price }}" required/><br>
                            <x-label for="stock">Stock: </x-label>
                            <x-input type="text" name="stock" value="{{ $product->stock }}" required/><br>
                        </div>
                        <div class="mx-auto mb-4">
                            <x-button>Guardar</x-button>
                        </div>
                    </div>      
                </form>
             </div>
         </div>
    </div>
</div>  
</x-app-layout>