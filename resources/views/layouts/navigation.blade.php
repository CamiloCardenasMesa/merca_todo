<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-800">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class=" flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('images/logo_mercatodo.png') }}" alt="MercaTodo logo" width="200">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class=" font-oswald text-5xl tracking-wide hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ trans('navigation.welcome') }}
                    </x-nav-link>

                    @can(
                        App\Constants\Permissions::ROLE_LIST,
                        App\Constants\Permissions::ROLE_CREATE, 
                        App\Constants\Permissions::ROLE_EDIT, 
                        App\Constants\Permissions::ROLE_DELETE,
                    )
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                            {{ __(trans('navigation.roles')) }}
                        </x-nav-link>
                    @endcan
                    @can(
                        App\Constants\Permissions::USER_LIST,
                        App\Constants\Permissions::USER_CREATE, 
                        App\Constants\Permissions::USER_EDIT, 
                        App\Constants\Permissions::USER_DELETE,
                    )
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                            {{ __(trans('navigation.users')) }}
                        </x-nav-link>
                    @endcan
                    @can(
                        App\Constants\Permissions::PRODUCT_LIST,
                        App\Constants\Permissions::PRODUCT_CREATE, 
                        App\Constants\Permissions::PRODUCT_EDIT, 
                        App\Constants\Permissions::PRODUCT_DELETE,
                    )
                        <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                            {{ __(trans('navigation.product_list')) }}
                        </x-nav-link>
                    @endcan
                    @can(
                        App\Constants\Permissions::ORDER_LIST,
                        App\Constants\Permissions::ORDER_SHOW,
                    )
                    <x-nav-link :href="route('buyer.orders.index')" :active="request()->routeIs('buyer.orders.index')">
                        {{ __(trans('navigation.orders')) }}
                    </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-white hover:text-green-500 hover:border-gray-300 focus:outline-none focus:text-green-500 focus:border-gray-300 transition duration-150 ease-in-out">
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
                </div>
                @endauth
                @guest
                    <div>
                        <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline">{{ trans('auth.login') }}</a>
                    </div>
                    <div>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-white dark:text-gray-500 underline">{{ trans('auth.register') }}</a>
                    </div>
                @endguest
            </div>

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
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
       
        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
            {{ __('Welcome') }}
        </x-nav-link>
        
        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
