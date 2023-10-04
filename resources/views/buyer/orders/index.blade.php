<x-app-layout>
    <x-slot name="header">
        {{ trans('order.purchase_orders') }}
    </x-slot>

    <x-article-layout>
        @if (count($orders))
            <table class="container">
                <thead>
                    <tr class="bg-gray-100 text-center">
                        <th class="border border-gray-300 px-4 py-2">{{ trans('order.reference') }}</th>
                        <th class="border border-gray-300 px-4 py-2">{{ trans('order.transaction_status') }}</th>
                        <th class="border border-gray-300 px-4 py-2">{{ trans('order.total') }}</th>
                        <th class="border border-gray-300 px-4 py-2">{{ trans('order.created_at') }}</th>
                        <th class="border border-gray-300 px-4 py-2">{{ trans('order.updated_at') }}</th>
                        @can(App\Constants\Permissions::ORDER_SHOW)
                        <th class="border border-gray-300 px-4 py-2">{{ trans('order.show') }}</th>
                        @endcan
                    </tr>
                </thead>  
                @foreach ($orders as $order)
                    <tbody>
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2">{{ $order->reference = str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->state }}</td>
                            <td class="border border-gray-300 px-4 py-2">$ {{ $order->total }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->created_at }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->updated_at }}</td>
                            @can(App\Constants\Permissions::ORDER_SHOW)
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <x-button-link href="{{ route('buyer.orders.show', $order) }}">{{ trans('buttons.show') }}</x-button-link>
                            </td>
                            @endcan
                        </tr>                                              
                    </tbody>
                @endforeach
            </table>
        @else
            <x-search-failure 
                :search-failure-text="trans('order.empty_order')"  
                :back-button-text="trans('buttons.add_products')"
                :route="route('welcome')"
            />
        @endif
    </x-article-layout>
</x-app-layout>