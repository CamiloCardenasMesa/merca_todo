<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-end">
            <x-button-link href="{{ route('buyer.cart.index') }}"> 🛒{{ trans('buttons.cart') }}
                ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})</x-button-link>
        </div>
    </x-slot>


    <div class="pt-8 pb-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
            <form action="{{ route('dashboard') }}" method="GET">
                <x-input type="text" name="query" placeholder="{{ trans('placeholders.dashboard_search') }}" />
                <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                {{ $products->links() }}
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 bg bg-white border border-gray-200 ">
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 ">
                            @foreach ($products as $product)
                                <div class="bg bg-gray-100 p-4 shadow-md hover:shadow-gray-500 ">
                                    <div class="mb-8">
                                        <a href="{{ route('buyer.products.show', $product) }}">
                                            <img width="500px" src="{{ asset('storage/' . $product->image) }}"
                                                alt="image">
                                        </a>
                                    </div>
                                    <div class="font-sans text-2xl font-bold py-2 leading-6">
                                        {{ $product->name }}
                                    </div>
                                    <div class="my-4 text-red-700 font-bold">
                                        $ {{ $product->price }}
                                    </div>
                                    <div class="py-2">
                                        {{ $product->description }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><br>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
