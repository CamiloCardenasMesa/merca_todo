<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-8 pb-8 pt-4 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="grid grid-cols-2 bg-gray-100 gap-10 pt-12 px-16 border">
                            <div>
                                <img  width="500px" src="{{ asset('storage/' .$product->image) }}" alt="image">
                            </div>
                            <div class="grid grid-rows-3 content-evenly">  
                                <div class="font-sans text-4xl">
                                    {{ $product->name }}
                                </div>
                                <div  class="font-sans text-2xl pt-8 text-red-700 font-bold ">
                                    {{ $product->price }}
                                </div>
                                <div class="text tex">
                                    {{ $product->description }}
                                </div>  
                                <div class="grid grid-cols-1">
                                    <div>
                                        <a href="{{route('dashboard')}}"> <x-button>Volver</x-button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>