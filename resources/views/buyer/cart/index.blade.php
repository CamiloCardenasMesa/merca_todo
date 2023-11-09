<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('cart.shopping_cart') }}
            <div class="flex">
                <x-auth-session-status class="mr-2" :status="session('status')" />
                <x-button-link href="{{ route('welcome') }}">
                    {{ trans('buttons.continue_shopping') }}
                </x-button-link>
            </div>
        </div>
    </x-slot>

    <x-section-layout>
        @if (count($shoppingCart))
            <div class="p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 bg-white border-b border-gray-200">
                <div class="gap-4 justify-between ">
                    @foreach ($shoppingCart as $cartItem)
                        <div
                            class=" font-oswald items-center grid-cols-2 md:grid-cols-1 gap-8 bg-gray-100 p-8 shadow-md hover:shadow-gray-500 mb-8">
                            <div class="mb-8">
                                <img src="{{ asset('storage/' . $cartItem->options->image) }}" alt="image">
                            </div>
                            <div>
                                <div class="text-4xl font-bold py-2 leading-10">
                                    {{ $cartItem->name }}
                                </div>
                                <div class="py-2 tracking-wider">
                                    {{ $cartItem->options->description }}
                                </div>
                                <div class="my-4 text-red-700 font-bold text-2xl">
                                    $ {{ $cartItem->price * $cartItem->qty }}
                                </div>
                                <div class="text text-center flex flex-grow gap-4 py-4 ">
                                    <form action="{{ route('buyer.cart.update', $cartItem->rowId) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="changeQuantity" value="decrease">
                                        <button type="submit" class="text text-lg rounded text-white bg-gray-800 px-4">
                                            -
                                        </button>
                                    </form>
                                    <div>
                                        {{ $cartItem->qty }}
                                    </div>
                                    <form action="{{ route('buyer.cart.update', $cartItem->rowId) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="changeQuantity" value="increase">
                                        <button type="submit" class="text text-lg rounded bg-gray-800 hover:bg-gray-300 text-white px-4">
                                            + 
                                        </button>
                                    </form>
                                </div>
                                <div class="flex gap-2">
                                    <form action="{{ route('buyer.cart.destroy', $cartItem->rowId) }}"
                                        method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <x-button
                                            onclick="return confirm ('¿Seguro que quieres eliminar este producto?')">
                                            {{ trans('buttons.delete') }}</x-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="font-oswald items-center gap-4 p-10 grid-rows-3">
                    <div class="text-3xl font-bold text-red-800">
                        Subtotal: ${{ Cart::pricetotal() }}
                    </div><br>
                    <div class="tracking-wider">
                        <p> Este pedido no tiene incluido impuestos aplicables, gastos de envío, cupones u
                            ofertas.</p><br>
                    </div>
                    <div>
                        <form action="{{ route('buyer.orders.store') }}" method="POST">
                            @csrf
                            <x-button>{{ trans('buttons.checkout') }}</x-button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <x-search-failure
                search-failure-text="{{ trans('cart.empty_cart') }}"  
                back-button-text="{{ trans('buttons.add_products') }}"
                route="{{ route('welcome') }}"
            />
        @endif
    </x-section-layout>
</x-app-layout>
