<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 bg-gray-100 gap-10 p-12 border">
                            <div class="flex flex-col justify-center">
                                <img  width="500px" src="{{ asset('storage/' .$product->image) }}" alt="image">
                            </div>
                            <div class="flex flex-col justify-center">  
                                <div class="font-sans text-4xl my-2">
                                    {{ $product->name }}
                                </div>
                                <div  class="font-sans text-red-700 font-bold text-2xl my-2 ">
                                    {{ $product->price }}
                                </div>
                                <div class="my-2">
                                    {{ $product->description }}
                                </div>  
                                <div class="my-2">
                                    <x-button-link href="{{route('dashboard')}}">Volver</x-button-link>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>  
</x-app-layout>