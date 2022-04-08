<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ÓRDENES DE COMPRA') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 px-4 py-2">Referencia</th>
                                <th class="border border-gray-400 px-4 py-2">Estado</th>
                                <th class="border border-gray-400 px-4 py-2">Total</th>
                                <th class="border border-gray-400 px-4 py-2">Fecha de Creación</th>
                                <th class="border border-gray-400 px-4 py-2">Fecha de actualización</th>
                                <th class="border border-gray-400 px-4 py-2">Ver Orden</th>
                            </tr>
                        </thead>  
                        @foreach ($orders as $order)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $order->reference }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $order->state }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $order->total }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $order->created_at }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $order->updated_at }}</td>

                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('buyer.orders.show', $order) }}">Ver</x-button-link>
                                    </td>
                                </tr>                                              
                            </tbody>
                        @endforeach
				    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>