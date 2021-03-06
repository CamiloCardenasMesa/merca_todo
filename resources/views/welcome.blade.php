<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <form action="{{ route('welcome') }}" method="GET">
                <x-input type="text" name="query" placeholder="{{ trans('placeholders.welcome_search') }}" />
                <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
            </form>
            <x-cart-button href="{{ route('buyer.cart.index') }}">
                ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})</x-cart-button>
        </div>
    </x-slot>
    <div class="pt-2 pb-14 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pb-6">
                {{ $products->links() }}
            </div>
            <div>
                <x-auth-session-status :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg bg-white border border-gray-200 ">
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 ">
                            @foreach ($products as $product)
                                <div class="flex flex-col justify-between transition duration-500 
                                            ease-in-out bg-gray-100 px-8 pt-4 pb-8 border-collapse 
                                            shadow-md hover:shadow-gray-500 ">
                                    <div class="mb-4">
                                        <a href="{{ route('buyer.products.show', $product) }}">
                                            <img src="{{ asset('storage/' . $product->image) }}"alt="image">
                                        </a>
                                    </div>
                                    <div class="justify-between font-oswald"> 
                                        <div class="text-2xl py-2 leading-7">
                                            {{ $product->name }}
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
                </div>
            </div><br>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>

