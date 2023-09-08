<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-between font-semibold font-oswald text-4xl text-gray-800 leading-tight">
                {{ trans('cart.shopping_cart') }}
            </div>
            <div class="flex">
                <x-button-link href="{{ route('welcome') }}">{{ trans('buttons.continue_shopping') }}
                </x-button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                                <button type="submit"
                                                    class="text text-lg rounded text-white bg-gray-800 px-4">-</button>
                                            </form>
                                            {{ $cartItem->qty }}
                                            <form action="{{ route('buyer.cart.update', $cartItem->rowId) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="changeQuantity" value="increase">
                                                <button type="submit"
                                                    class="text text-lg rounded bg-gray-800 hover:bg-gray-300 text-white px-4">
                                                    + </button>
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
                    <div class="text text-center pt-6">
                        <div class="text-2xl">
                            {{ trans('cart.empty_cart') }}
                        </div>
                        <div class="pt-2 mb-6">
                            <x-button-link href="{{ route('welcome') }}">{{ trans('buttons.add_products') }}
                            </x-button-link>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
