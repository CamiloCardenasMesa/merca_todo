<nav class="bg-dark-blue">
    <header class="flex items-center justify-between h-16 mx-auto px-6 lg:px-8 @if(auth()->check()) md:mr-10 lg:mr-12 @else max-w-7xl @endif">
        @if ($userHasPermissions)
            <div id="hamburger" class="rounded-md inline-flex sm:hidden justify-start items-center text-2xl cursor-pointer text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div> 
            <div id="nav-close" class="rounded-md inline-flex sm:hidden justify-start items-center text-2xl cursor-pointer text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>   
        @endif  
        <a href="{{ route('welcome') }}">
            <img class="h-10 md:h-12 lg:h-14" src="{{ asset('images/login_logo_mercatodo.png') }}" alt="MercaTodo logo">
        </a>
        <div class="flex items-center">
        @guest
        <div class="flex text-white">
            <div>
                <a href="{{ route('login') }}" class="text-sm font-medium">{{ trans('auth.login') }}</a>
            </div>
            <div>
                <a href="{{ route('register') }}" class="ml-2 text-sm font-medium">{{ trans('auth.register') }}</a>
            </div>
        </div>
        @endguest
            <x-cart-button class="text-sm" href="{{ route('buyer.cart.index') }}">
                ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})
            </x-cart-button>
        </div>
    </header>
</nav>