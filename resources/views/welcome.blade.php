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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
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
                    <x-button-link class="h-9 my-auto" href="{{route('buyer.cart.index')}}">🛒 Carrito ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</x-button-link>
                </div>
            </div>
        </header>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="pt-8 pb-14">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
                    <form action="{{ route('welcome') }}" method="GET"> 
                        <x-input type="text" name="query" placeholder="Busca aquí tu instrumento" />
                        <x-button class="ml-2">Buscar</x-button>
                    </form>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="mb-4">
                        {{ $products -> links() }}
                    </div> 
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-10 bg bg-white border border-gray-200 ">
                            <div class="container">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 ">
                                    
                                    @foreach ($products as $product) 
                                    <div class="bg-gray-100 p-4 shadow-md hover:shadow-gray-500 ">
                                        <div class="mb-8">
                                            <a href="{{ route('guest.products.show', $product) }}">  
                                                <img width="500px" src="{{ asset('storage/' .$product->image) }}" alt="image">
                                            </a> 
                                        </div>
                                        <div class="font-sans text-2xl font-bold py-2 leading-6">
                                            {{ $product->name }}
                                        </div>
                                        <div class="my-4 text-red-700 font-bold">
                                            $ {{ $product->price }}
                                        </div>
                                        <div class="py-2">
                                            {{ $product->description }} 
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><br>
                    {{ $products -> links() }}
                </div>
            </div>   
        </div>
    </body>
</html>
