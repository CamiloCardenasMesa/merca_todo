<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ ucwords($product->name) }} 
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>
    <x-section-layout>
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 bg-gray-100 gap-10 p-9 border-gray-500 shadow-sm rounded-lg">
                <div class="flex flex-col justify-center">
                    <img  width="500px" src="{{ asset('storage/'.$product->image) }}" alt="image">
                </div>
                <div class="flex flex-col justify-center">  
                    <div class="font-oswald text-4xl my-2">
                        {{ ucwords($product->name) }}
                    </div>
                    <div class="my-6 tracking-wider">
                        {{ $product->description }}
                    </div>
                    <div class="text-red-700 font-medium text-2xl">
                        $ {{ $product->price }}
                    </div>
                    <div class="mt-6">
                        <form action="{{route('buyer.cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <x-label for="product_amount" :value="__(trans('products.quantity'))" /> 
                        <div class="flex flex-row mb-2">
                                <x-input class="w-16 h-9 mr-2" type="number" min="1" max="10" name="product_amount" required />
                                <x-add-to-cart />
                            </form>
                        </div>
                        <div>
                            <x-button-link href="{{route('welcome')}}">{{ trans('buttons.back') }}</x-button-link>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </x-section-layout>
</x-app-layout>