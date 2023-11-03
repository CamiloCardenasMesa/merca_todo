<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    {{-- header --}}
    <nav class="bg-dark-blue">
        <header class="flex items-center justify-between h-16 mx-auto px-6 lg:px-8 @if(auth()->check()) md:mr-10 lg:mr-12 @else max-w-7xl @endif">
            <a href="{{ route('welcome') }}">
                <img class="h-10 md:h-12 lg:h-14" src="{{ asset('images/login_logo_mercatodo.png') }}" alt="MercaTodo logo">
            </a>
            <div class="flex items-center">
                <div class="flex text-white">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium hover:text-primary-yellow hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ trans('auth.logout') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                    @guest
                        <div>
                            <a href="{{ route('login') }}" class="text-sm font-medium">{{ trans('auth.login') }}</a>
                        </div>
                        <div>
                            <a href="{{ route('register') }}" class="ml-2 text-sm font-medium">{{ trans('auth.register') }}</a>
                        </div>
                    @endguest
                </div>
                <x-cart-button class="text-sm" href="{{ route('buyer.cart.index') }}">
                    ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})
                </x-cart-button>
            </div>
        </header>
    </nav>

    <div class="flex">
        {{-- navigation bar --}}
        @auth
        @if ($userHasPermissions)
            <aside id="nav-menu" class="text-white md:block hidden bg-aside-gray px-3 lg:px-6 w-80">   
                <div class="flex-1">
                    <div id="nav-close" class="flex py-2 sm:hidden text-dark-blue justify-end text-2xl cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        @include('layouts.navigation')
                    </div>
                </div>
            </aside>
            @endif
        @endauth

        {{-- main --}}
        <div class="bg-[#EBEBF1] px-6 pb-6 w-full overflow-auto">
            {{-- hamburquer --}}
            <div class="h-6 my-3">
                @if ($userHasPermissions)
                    <div id="hamburger" class="rounded-md inline-flex sm:hidden justify-start items-center text-2xl cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>    
                @endif
            </div>
        
            <main class="sm:px-6 lg:px-8 bg-mi-color">
                <header class="max-w-7xl sm:pt-0 pb-4 mx-auto sm:px-6 lg:px-8">
                    <h2 class="font-semibold font-oswald text-4xl text-dark-blue leading-tight">
                        {{ $header }}
                    </h2>
                </header>
                {{ $slot }}
            </main>
        </div>
    </div>
    <x-footer />
</body>
<script src="{{ asset('js/main.js') }}"></script>
</html>