<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital@0;1&family=Martian+Mono:wght@100&family=Open+Sans:wght@300&family=Oswald:wght@300&family=Roboto&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Logo -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body >
    <div class="flex">
        {{-- @if(App\Http\Controllers\BuyerController::userHasPermission()) --}}
        @auth
            <aside id="nav-menu" class="text-white hidden w-64 md:block bg-gray-800">   
                <header class="bg-[#737282] flex items-center px-6 h-16 border-spacing-0">
                    <div class="flex items-center pl-3">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('images/logo_mercatodo.png') }}" alt="MercaTodo logo" width="140">
                        </a>
                    </div>
                </header>
                    <div class="container relative flex flex-col">
                        <div id="nav-close" class="p-4 flex sm:hidden justify-end text-2xl cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <nav>
                            <div class="py-9 px-6 ">
                                <ul class="flex flex-col flex-grow gap-y-1 text-white font-medium">
                                    @can(
                                        App\Constants\Permissions::USER_LIST,
                                        App\Constants\Permissions::PRODUCT_LIST,
                                        App\Constants\Permissions::ORDER_LIST,
                                        App\Constants\Permissions::ROLE_LIST
                                    )
                                    <li>
                                        <a href={{ route('admin.users.dashboard') }}>
                                            <div class="flex items-center gap-x-2 py-2 rounded-md hover:bg-gray-700 transition duration-150 ease-in-out px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                                    </svg>                                              
                                                    <div>
                                                        {{ trans('navigation.dashboard') }}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endcan

                                    @can(
                                    App\Constants\Permissions::PRODUCT_LIST,
                                    App\Constants\Permissions::PRODUCT_CREATE,
                                    App\Constants\Permissions::PRODUCT_EDIT,
                                    App\Constants\Permissions::PRODUCT_DELETE,
                                    )
                                    <li>
                                        <a href="{{ route('admin.products.index') }}">
                                            <div class="flex items-center gap-x-2 py-2 rounded-md hover:bg-gray-700 transition duration-150 ease-in-out px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                                    </svg>
                                                    <div>
                                                        {{ trans('navigation.product_list') }}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endcan

                                    @can(
                                        App\Constants\Permissions::ORDER_LIST,
                                        App\Constants\Permissions::ORDER_SHOW,
                                    )
                                    <li>
                                        <a href="{{ route('buyer.orders.index') }}">
                                            <div class="flex items-center gap-x-2 py-2 rounded-md hover:bg-gray-700 transition duration-150 ease-in-out px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                    </svg>
                                                    <div>
                                                        {{ trans('navigation.orders') }}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endcan

                                    @can(
                                        App\Constants\Permissions::USER_LIST,
                                        App\Constants\Permissions::USER_CREATE,
                                        App\Constants\Permissions::USER_EDIT,
                                        App\Constants\Permissions::USER_DELETE,
                                    )
                                    <li>
                                        <a href="{{ route('admin.users.index') }}">
                                            <div class="flex items-center gap-x-2 py-2 rounded-md hover:bg-gray-700 transition duration-150 ease-in-out px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                                    </svg>
                                                    <div>
                                                        {{ trans('navigation.users') }}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endcan

                                    @can(
                                        App\Constants\Permissions::ROLE_LIST,
                                        App\Constants\Permissions::ROLE_CREATE,
                                        App\Constants\Permissions::ROLE_EDIT,
                                        App\Constants\Permissions::ROLE_DELETE,
                                    )
                                    <li>
                                        <a href="{{ route('roles.index') }}">
                                            <div class="flex items-center gap-x-2 py-2 rounded-md hover:bg-gray-700 transition duration-150 ease-in-out px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    <div>
                                                        {{ trans('navigation.roles') }}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endcan
                                </ul> 
                            </div> 
                        </nav>
                    </div>
            </aside>
        @endauth
        {{-- @endif --}}

        <div class="flex flex-col flex-grow">
            <div class="bg-[#737282] px-6">
                <div class="bg-[#737282] sm:px-6 lg:px-8">
                    <nav class= "flex items-center justify-between max-w-7xl h-16 mx-auto sm:px-6 lg:px-8">
                        @guest
                            <a class="flex flex-col items-center" href="{{ route('welcome') }}">
                                <img src="{{ asset('images/logo_mercatodo.png') }}" alt="MercaTodo logo" width="140">
                            </a>
                        @endguest

                        <div class="flex justify-end">
                            @auth
                                <div id="hamburger" class="rounded-md flex sm:hidden justify-end text-2xl cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </div>    
                            @endauth
                        </div>
    
                        <div class="flex justify-end">
                            @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center text-sm font-medium text-gray-800 hover:text-green-500 hover:border-gray-300 focus:outline-none focus:text-green-500 focus:border-gray-300 transition duration-150 ease-in-out">
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
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
    
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                            @endauth
                            @guest
                                <div>
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-900 dark:text-gray-500">{{ trans('auth.login') }}</a>
                                </div>
                                <div>
                                    <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-gray-900 dark:text-gray-500">{{ trans('auth.register') }}</a>
                                </div>
                            @endguest
                            
                        </div>
                    </nav>
                </div>
            </div>
            <div class="bg-[#EBEBF1] px-6 pb-9">
                <main class="sm:px-6 lg:px-8 bg-mi-color">
                    <header class="max-w-7xl pt-9 pb-5 mx-auto sm:px-6 lg:px-8">
                        <div>
                            <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
