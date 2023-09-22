<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-between font-semibold font-oswald text-4xl text-gray-800 leading-tight">
                {{ ucwords($product->name) }} 
            </div>
            <div class="flex">
                <x-auth-session-status class="mr-2" :status="session('status')" />
                <x-cart-button class="text-sm p-3" href="{{ route('buyer.cart.index') }}">
                    ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})
                </x-cart-button>
            </div>
        </div>
    </x-slot>
    <x-article-layout>
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 bg-gray-100 gap-10 p-12 border">
                <div class="flex flex-col justify-center">
                    <img  width="500px" src="{{ asset('storage/'.$product->image) }}" alt="image">
                </div>
                <div class="flex flex-col justify-center">  
                    <div class="font-oswald text-4xl my-2">
                        {{ ucwords($product->name) }}
                    </div>
                    <div class="my-6 tracking-wider">
                        {{ $product->description }}
                    </div>
                    <div class="text-red-700 font-bold text-2xl mb-2">
                        $ {{ $product->price }}
                    </div>
                    <div>
                        <form action="{{route('buyer.cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <x-label for="product_amount" :value="__(trans('products.quantity'))" /> 
                        <div class="flex flex-row mb-2">
                                <x-input class="w-16 h-9 mr-2" type="number" min="1" name="product_amount" required />
                                <x-add-to-cart />
                            </form>
                        </div>
                        <div>
                            <x-button-link href="{{route('welcome')}}">{{ trans('buttons.back') }}</x-button-link>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </x-article-layout>
</x-app-layout>