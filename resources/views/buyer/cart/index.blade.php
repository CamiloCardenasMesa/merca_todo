<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Carrito de compras') }} 🛒
            </div>
            <div>
                <x-button-link href="{{route('dashboard')}}">Continuar comprando</x-button-link>
            </div>
        </div>
    </x-slot>
 
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($shoppingCart))
                <div class="p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 bg-white border-b border-gray-200">
                    <div class="gap-4 justify-between ">
                        @foreach ($shoppingCart as $cartItem ) 
                        <div class="items-center grid-cols-2 md:grid-cols-1 gap-8 bg-gray-100 p-8 shadow-md hover:shadow-gray-500 mb-8">
                            <div class="mb-8">
                                <img src="{{ asset('storage/' .$cartItem->options->image) }}" alt="image">
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
                    <div class=" items-center gap-4 p-10 font-bold grid-rows-3">
                        <div class="font-sans text-2xl text-red-800">
                            Subtotal: ${{  Cart::pricetotal() }}
                        </div><br>
                        <div>
                            <p> Este pedido no tiene incluido impuestos aplicables, gastos de envío, cupones u ofertas.</p><br>
                        </div>
                        <div>
                            <form action="{{ route('buyer.orders.store') }}" method="POST" >
                                @csrf
                                <x-button>Finalizar Compra</x-button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="text text-center pt-6">
                    <div class="text-2xl">
                        El carrito está vacío
                    </div>
                    <div class="pt-2 mb-6">
                        <x-button-link href="{{route('dashboard')}}">Agregar productos</x-button-link>
                    </div>
                </div> 
                @endif
            </div>  
        </div>
    </div>  
</x-app-layout>