<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
                {{ trans('order.order_reference') }}
                {{ $order->reference = str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
            </div>
        </div>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 bg-gray-100 gap-10 p-12 border">
                            <div class="flex flex-col justify-center tracking-wider">
                                <div>
                                    @if ($order->state === App\Constants\States::PENDING)
                                        <div class="text-yellow-500 font-semibold text-2xl my-2">
                                            {{ trans('order.transaction_status') . $order->state }}
                                        </div>
                                        <span>{{ trans('order.pending_order_message') }}</span>
                                        <div class="mb-12 mt-4">
                                            <x-button-link href="{{ $order->process_url }}">{{ trans('buttons.retry_payment') }}</x-button-link>
                                        </div>
                                    @elseif ($order->state === App\Constants\States::REJECTED)
                                        <div class="text-red-700 font-semibold text-2xl my-2">
                                            {{ trans('order.transaction_status') . $order->state }}
                                        </div>
                                        <span>{{ trans('order.rejected_order_message') }}</span>
                                        <div class="mb-12 mt-4">
                                            <x-button-link href="{{ route('buyer.orders.retry', $order) }}">{{ trans('buttons.retry_payment') }}</x-button-link>
                                        </div>
                                    @else
                                        <div class="text-green-400 font-semibold text-2xl my-2">
                                            {{ trans('order.transaction_status') . $order->state }}
                                        </div>
                                        <div class="text-2xl mb-6">
                                            {{ trans('order.total') . $order->total }}
                                        </div>
                                        <div class="mb-6">
                                            <span class="mb-8">{{ trans('order.transaction_success') }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <x-button-link href="{{ route('welcome') }}">
                                        {{ trans('buttons.search_products') }}</x-button-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
