<x-app-layout>
    <x-slot name="header">
        {{ trans('order.purchase_orders') }}
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                @if (count($orders))
                    <div class="p-8 bg-white border-b border-gray-200">
                        <table class="container">
                            <thead>
                                <tr class="bg-gray-100 text-center">
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('order.reference') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('order.transaction_status') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('order.total') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('order.created_at') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('order.updated_at') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('order.show') }}</th>
                                </tr>
                            </thead>  
                            @foreach ($orders as $order)
                                <tbody>
                                    <tr class="text-center">
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->reference = str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->state }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->total }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->created_at }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $order->updated_at }}</td>

                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('buyer.orders.show', $order) }}">{{ trans('buttons.show') }}</x-button-link>
                                        </td>
                                    </tr>                                              
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @else
                    <div class="grid justify-center text-center py-6 gap-3">
                        <div class="text-2xl">
                            {{ trans('order.empty_order') }}
                        </div>
                        <div>
                            <x-button-link href="{{ route('welcome') }}">
                                {{ trans('buttons.add_products') }}
                            </x-button-link>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>