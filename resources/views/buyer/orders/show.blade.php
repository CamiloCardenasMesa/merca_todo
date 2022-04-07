<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Historial de Compras') }} 
            </div>
            <div>
                <x-button-link href="{{route('buyer.cart.index')}}"> 🛒 Carrito ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</x-button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 bg-gray-100 gap-10 p-12 border">
                            <div class="flex flex-col justify-center">  
                                <div  class="font-sans font-bold text-2xl my-2 ">
                                    @if ($order->state === 'PENDING')
                                        <div class="text-yellow-500">
                                            Estado de la transacción: {{ $order->state }}
                                        </div>
                                    @elseif ($order->state === 'REJECTED')
                                        <div class="text-red-700">
                                            Estado de la transacción: {{ $order->state }}
                                        </div>
                                    @else 
                                        <div class="text-green-500">
                                            Estado de la transacción: {{ $order->state }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    @if ($order->state === 'PENDING')
                                        <span>Su pago está pendiente, le avisaremos cuando sea aprobada o puede reintentar el pago</span>
                                        <div class="mb-12 mt-4">
                                            <x-button-link href="{{ $order->process_url }}">Reintentar pago</x-button-link>
                                        </div>
                                    @elseif ($order->state === 'REJECTED')
                                        <span>Su pago fue rechazado, lo invitamos a reintentar el pago</span>
                                        <div class="mb-12 mt-4">
                                            <x-button-link href="{{ route('buyer.orders.retry', $order) }}">Reintentar pago</x-button-link>
                                        </div>
                                    @else 
                                        <div class="text-2xl mb-6">
                                            Total: ${{ $order->total }}
                                        </div>
                                        <div class="mb-6">
                                            <span class="mb-8">Felicitaciones! Tu pago ha sido aprobado. Gracias por tu compra.</span>
                                        </div>
                                    @endif
                                </div>
                                    <div>
                                        <x-button-link href="{{route('dashboard')}}">Ver más productos</x-button-link>
                                    </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>  
</x-app-layout>