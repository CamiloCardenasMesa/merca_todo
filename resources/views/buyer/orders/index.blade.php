<x-app-layout>
    <x-slot name="header">
        {{ trans('order.purchase_orders') }}
    </x-slot>

    <x-article-layout>
        @if (count($orders))
            <table class="container">
                <thead>
                    <tr class="bg-gray-100 text-left border-y border-gray-300 text-gray-600">
                        <th class="border-b border-gray-300 px-4 py-2">{{ trans('order.reference') }}</th>
                        <th class="border-b border-gray-300 px-4 py-2">{{ trans('order.transaction_status') }}</th>
                        <th class="border-b border-gray-300 px-4 py-2">{{ trans('order.total') }}</th>
                        <th class="border-b border-gray-300 px-4 py-2">{{ trans('order.created_at') }}</th>
                        <th class="border-b border-gray-300 px-4 py-2">{{ trans('order.updated_at') }}</th>
                        
                        @can(App\Constants\Permissions::ORDER_SHOW)
                        <th class="border-b border-gray-300 pr-4 py-2">{{ trans('order.show') }}</th>
                        @endcan
                    </tr>
                </thead>  
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                            <td class="border-b px-4">{{ $order->reference = str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td class="border-b px-4">{{ $order->state }}</td>
                            <td class="border-b px-4">$ {{ $order->total }}</td>
                            <td class="border-b px-4">{{ $order->created_at }}</td>
                            <td class="border-b px-4">{{ $order->updated_at }}</td>
                            
                            @can(App\Constants\Permissions::ORDER_SHOW)
                            <td class="border-b">
                                <x-show-button route="{{ route('buyer.orders.show', $order) }}" />
                            </td>                           
                            @endcan
                        </tr>                                              
                    @endforeach
                </tbody>
            </table>
        @else
            <x-search-failure 
                search-failure-text="{{ trans('order.empty_order') }}"  
                back-button-text="{{ trans('buttons.add_products') }}"
                route="{{ route('welcome') }}"
            />
        @endif
    </x-article-layout>
</x-app-layout>