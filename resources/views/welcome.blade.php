<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.welcome') }}
            <div class="flex">
                <x-auth-session-status class="mr-2" :status="session('status')" />
                <x-cart-button href="{{ route('buyer.cart.index') }}">
                    ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})
                </x-cart-button>
            </div>
        </div> 
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4"> 
                <div class="p-8">
                    <div class="flex justify-between mb-6">
                        <form class="flex justify-between" action="{{ route('welcome') }}" method="GET">
                            <x-input type="text" name="query" placeholder="{{ trans('placeholders.welcome_search') }}" />
                            <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
                        </form>
                        <div>
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                            @foreach ($products as $product)
                                <div class="flex flex-col justify-between transition duration-500 
                                            ease-in-out bg-gray-100 px-8 pt-4 pb-8 border-collapse 
                                            shadow-md hover:shadow-gray-500 ">
                                    <div class="mb-4">
                                        <a href="{{ route('buyer.products.show', $product) }}">
                                            <img src="{{ asset('storage/' . $product->image) }}"alt="image">
                                        </a>
                                    </div>
                                    <div class="justify-between"> 
                                        <div class="text-2xl py-2 leading-7">
                                            {{ ucwords($product->name) }}
                                        </div>
                                        <div class="my-2 text-red-700 font-bold">
                                            $ {{ $product->price }}
                                        </div>
                                        <div class="flex flex-row justify-start">
                                            <div>
                                                <form action="{{route('buyer.cart.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <x-input class="w-16 h-9 mr-2" type="number" min="1" name="product_amount" required />
                                            </div>
                                                <div >
                                                    <x-add-to-cart />
                                                </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

