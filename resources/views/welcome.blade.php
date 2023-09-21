<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.welcome') }}
            <div class="flex">
                <x-auth-session-status class="mr-2" :status="session('status')" />
                <x-cart-button class="text-sm p-3" href="{{ route('buyer.cart.index') }}">
                    ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})
                </x-cart-button>
            </div>
        </div>
    </x-slot>

    <x-article-layout>
        @if ($products->isEmpty())
            <div class="grid justify-center text-center gap-3">
                <div class="font-oswald text-3xl text-gray-800 leading-tight">
                    {{ trans('products.search_failure') }}
                </div>
                <div>
                    <x-button-link href="{{ route('welcome') }}">
                        {{ trans('buttons.back') }}
                    </x-button-link>
                </div>
            </div>
        @else
            <div class="flex justify-between items-center mb-9">
                <form class="flex justify-between" action="{{ route('welcome') }}" method="GET">
                    <x-input type="text" name="query" placeholder="{{ trans('placeholders.welcome_search') }}" />
                    <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
                </form>
            </div>
        @endif
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div
                        class="bg-gray-100 flex flex-col justify-between transition duration-500 
                                ease-in-out border-collapse 
                                shadow-md hover:shadow-gray-500 ">
                        <div class="">
                            <a href="{{ route('buyer.products.show', $product) }}">
                                <img src="{{ asset('storage/' . $product->image) }}"alt="image" />
                            </a>
                        </div>
                        <div class="grid grid-cols-1 gap-y-3 p-6">
                            <div class="font-oswald text-3xl">
                                {{ ucwords($product->name) }}
                            </div>
                            <div class="text-red-700 font-bold">
                                $ {{ $product->price }}
                            </div>
                            <form class="flex" action="{{ route('buyer.cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <x-input class="w-16 h-9 mr-2" type="number" min="1" name="product_amount"
                                    required />
                                <div>
                                    <x-add-to-cart />
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-article-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        {{ $products->links() }}
    </div>
</x-app-layout>
