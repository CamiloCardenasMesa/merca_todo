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
                            <x-table-cell-actions
                                route="{{ route('buyer.orders.show', $order) }}"
                                hoverBgClass="hover:bg-yellow-500" 
                                svgPath="<path stroke-linecap='round' stroke-linejoin='round' d='M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z' />
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />" 
                            />                            
                            @endcan
                        </tr>                                              
                    @endforeach
                </tbody>
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