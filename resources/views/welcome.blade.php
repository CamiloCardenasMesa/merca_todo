<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.welcome') }}
        </div>
    </x-slot>

    <x-article-layout>
        @if ($products->isEmpty())
            <x-search-failure 
                :search-failure-text="trans('products.search_failure')"
                :route="route('welcome')"
                :back-button-text="trans('buttons.back')"
            />
        @else
            <div class="flex flex-col items-start justify-between lg:flex-row lg:items-center">
                <x-search-item route="{{ route('welcome') }}" placeholder="{{ trans('placeholders.welcome_search') }}"/>
                <x-auth-session-status :status="session('status')" />
            </div>
        @endif
        <div class="container mt-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-gray-100 flex flex-col justify-between transition duration-500 
                                ease-in-out
                                shadow-md shadow-gray-250 hover:shadow-gray-400 overflow-auto">
                        
                        <a href="{{ route('buyer.products.show', $product) }}">
                            <img src="{{ asset('storage/' . $product->image) }}"alt="image" />
                        </a>
                        
                        <div class="grid grid-cols-1 gap-y-2 p-6">
                            <div class="font-oswald text-3xl">
                                {{ ucwords($product->name) }}
                            </div>
                            <div class="text-red-700 font-bold">
                                $ {{ $product->price }}
                            </div>
                            <form class="flex" action="{{ route('buyer.cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <x-input class="w-16 h-9 mr-2" type="number" min="1" name="product_amount" required />
                                <x-add-to-cart />
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-article-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
        {{ $products->links() }}
    </div>
</x-app-layout>
