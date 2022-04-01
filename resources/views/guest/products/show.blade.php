<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MercaTodo</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        
    </head>
    <body class="antialiased">
        @if (Route::has('login'))
        <div class=" bg-gray-800">
            <div class="flex justify-end top-0 right-0 px-6 py-4   max-w-7xl mx-auto sm:px-6 lg:px-8">
                @auth
                    <div>
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white dark:text-gray-500 underline">Dashboard</a>
                    </div>
                @else
                    <div>
                        <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline">Log in</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white dark:text-gray-500 underline">Register</a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
        @endif
        
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">
                    <div>
                        <a href="{{ route('welcome') }}">
                            <img
                            src="{{ asset('images/login_logo_mercatodo.png') }}" 
                            alt="MercaTodo logo"
                            width="200">
                        </a>
                    </div>
                    <x-button-link class="h-9 my-auto" href="{{route('buyer.cart.index')}}"> 🛒 Carrito ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</x-button-link>
                </div>
            </div>
        </header>
        <div class="bg-gray-100 py-8">
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
                                    </div><br>  
                                    <div>
                                        <form action="{{route('buyer.cart.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                                            <x-label for="product_amount" :value="__('Cantidad')" />
                                            <x-input class="w-16 h-9 mr-2" type="number" min="1" name="product_amount" required />
                                            <x-button>{{  __('Añadir al carrito') }}</x-button>
                                        </form><br>
                                        <div class="my-2">
                                            <x-button-link href="{{route('welcome')}}">Volver</x-button-link>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </body>
</html>
