<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __($product->name) }} 
            </div>
            <div>
                <x-button-link href="{{route('buyer.cart.index')}}"> 🛒{{ trans('buttons.cart') }}
                     ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</x-button-link>
            </div>
        </div>
    </x-slot>

    
    <div class="py-8 bg-gray-100 min-h-screen ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 bg-gray-100 gap-10 p-12 border">
                            <div class="flex flex-col justify-center">
                                <img  width="500px" src="{{ asset('storage/'.$product->image) }}" alt="image">
                            </div>
                            <div class="flex flex-col justify-center">  
                                <div class="font-sans text-4xl my-2">
                                    {{ $product->name }}
                                </div>
                                <div  class="font-sans text-red-700 font-bold text-2xl my-2 ">
                                    $ {{ $product->price }}
                                </div>
                                <div class="my-2">
                                    {{ $product->description }}
                                </div>
                                    <br> 
                                <div>
                                    <form action="{{route('buyer.cart.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <x-label for="product_amount" :value="__(trans('products.quantity'))" /> 
                                        <x-input class="w-16 h-9 mr-2" type="number" min="1" name="product_amount" required />
                                        <x-button>{{ trans('buttons.add_to_cart') }}</x-button>
                                    </form>
                                        <br>
                                    <div class="my-2">
                                        <x-button-link href="{{route('welcome')}}">{{ trans('buttons.back') }}</x-button-link>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>  
</x-app-layout>