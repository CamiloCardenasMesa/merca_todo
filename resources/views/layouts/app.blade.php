<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Logo -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body >
    <div class="flex min-h-screen w-full overflow-x-clip">
        <aside class="bg-gray-800">
            <header class="bg-gray-200 flex items-center h-16 p-4">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('images/logo_mercatodo.png') }}" alt="MercaTodo logo" width="140">
                    </a>
                </div>
            </header>
            <nav class="container relative flex flex-col pl-4">
                <div class="flex justify-end p-3">
                    {{-- Tailwind CSS: Build and Deploy a Fully Responsive Burger Website || Light & Dark Mode (2023) --}}
                    <div class="text-2xl cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>                  
                    </div>
                    <div class="text-2xl cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                    </div>
                </div>
                    
                <ul>
                    <li>
                        @can(
                            App\Constants\Permissions::USER_LIST,
                            App\Constants\Permissions::PRODUCT_LIST,
                            App\Constants\Permissions::ORDER_LIST,
                            App\Constants\Permissions::ROLE_LIST
                        )
                        <x-nav-link :href="route('admin.users.dashboard')" :active="request()->routeIs('admin.users.dashboard')">
                            {{ trans('navigation.dashboard') }}
                        </x-nav-link>
                        @endcan
                    </li>
                    <li>
                        <div>
                            <!-- <span>Panel administrativo</span>
                            <button> < </button> -->
                        </div>
                        <!-- Settings Dropdown -->
                        <ul>
                            <li class="flex">
                                <a>
                                    <div>
                                        @can(
                                        App\Constants\Permissions::PRODUCT_LIST,
                                        App\Constants\Permissions::PRODUCT_CREATE,
                                        App\Constants\Permissions::PRODUCT_EDIT,
                                        App\Constants\Permissions::PRODUCT_DELETE,
                                    )
                                        <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                                            {{ trans('navigation.product_list') }}
                                        </x-nav-link>
                                    @endcan
                                    </div>
                                </a>
                            </li>
                            <li class="flex">
                                <a>
                                    <div>
                                    @can(
                                        App\Constants\Permissions::ORDER_LIST,
                                        App\Constants\Permissions::ORDER_SHOW,
                                    )
                                        <x-nav-link :href="route('buyer.orders.index')" :active="request()->routeIs('buyer.orders.index')">
                                            {{ trans('navigation.orders') }}
                                        </x-nav-link>
                                    @endcan
                                    </div>
                                </a>
                            </li>
                            <li class="flex">
                                <a>
                                    <div>
                                    @can(
                                        App\Constants\Permissions::USER_LIST,
                                        App\Constants\Permissions::USER_CREATE,
                                        App\Constants\Permissions::USER_EDIT,
                                        App\Constants\Permissions::USER_DELETE,
                                    )
                                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                                            {{ trans('navigation.users') }}
                                        </x-nav-link>
                                    @endcan
                                    </div>
                                </a>
                            </li>
                            <li class="flex">
                                <a>
                                    <div>
                                    @can(
                                        App\Constants\Permissions::ROLE_LIST,
                                        App\Constants\Permissions::ROLE_CREATE,
                                        App\Constants\Permissions::ROLE_EDIT,
                                        App\Constants\Permissions::ROLE_DELETE,
                                    )
                                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                                            {{ trans('navigation.roles') }}
                                        </x-nav-link>
                                    @endcan
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="flex flex-col flex-grow">
            <div class="bg-gray-200 h-16">
                <nav class="max-w-7xl mx-auto sm:px-6 lg:px-6 xl:p-3 bg-gray-200">
                    <div class="flex h-16 items-center justify-end">
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
                                <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline">{{ trans('auth.login') }}</a>
                            </div>
                            <div>
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-white dark:text-gray-500 underline">{{ trans('auth.register') }}</a>
                            </div>
                        @endguest
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
            <main class="bg-gray-100 px-6 sm:px-3 lg:px-6">
                <header class="py-6 mx-auto sm:px-6 lg:px-6">
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
</body>
</html>
