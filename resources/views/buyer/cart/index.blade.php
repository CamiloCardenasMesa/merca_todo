<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Carrito de compras') }}
            </div>
            <div>
                <x-button-link href="{{route('dashboard')}}">Continuar comprando</x-button-link>
            </div>
        </div>
    </x-slot>
 {{-- {{ debug($shoppingCart) }} --}}
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class=" flex justify-between">
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 ">
                            @foreach ($shoppingCart as $cartItem ) 
                            <div class="flex items-center gap-10 bg-gray-100 p-8 shadow-md hover:shadow-gray-500 ">
                                <div>
                                    <img width="800px" src="{{ asset('storage/' .$cartItem->options->image) }}" alt="image">
                                </div>
                                <div>
                                    <div class="font-sans text-2xl font-bold py-2 leading-6">
                                        {{ $cartItem->name }}
                                    </div>
                                    <div class="my-4 text-red-700 font-bold">
                                       $ {{ $cartItem->price * $cartItem->qty }}
                                    </div>
                                    <div class="py-2">
                                        {{ $cartItem->options->description }} 
                                    </div>
                                    <div class="text text-center flex flex-grow gap-4 py-4 ">
                                        <form action="{{ route('buyer.cart.update', $cartItem->rowId) }}" method="POST" >
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="changeQuantity" value="decrease">
                                            <button type="submit" class="text text-lg rounded text-white bg-gray-800 px-4">-</button>
                                        </form>
                                            {{ $cartItem->qty }}
                                        <form action="{{ route('buyer.cart.update', $cartItem->rowId) }}" method="POST" >
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="changeQuantity" value="increase">
                                            <button type="submit" class="text text-lg rounded bg-gray-800 hover:bg-gray-300 text-white px-4"> + </button>
                                        </form>
                                    </div>
                                    <div class="flex gap-2">
                                        <form action="{{ route('buyer.cart.destroy', $cartItem->rowId) }}" method="POST"> 
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <x-button onclick="return confirm ('¿Seguro que quieres eliminar este producto?')">Eliminar</x-button>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class=" flex p-12 flex-row row-start-2 gap-4 text text-2xl font-bold text-red-700">
                            Subtotal: {{ Cart::pricetotal() }}
                        </div>
                        <p> This order is in USD. Applicable taxes, shipping, coupons or special offers will be applied at Checkout.</p><br>
                    </div>
                </div>
            </div>  
        </div>
    </div>  
</x-app-layout>