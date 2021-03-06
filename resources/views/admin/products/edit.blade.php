
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->name) }}
        </h2>
    </x-slot>
    <div class="py-12 min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-12 py-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-2">
                            <div class="grid grid-rows-1 gap-1"><br>
                                <x-label for="image">{{ trans('products.current_image') }}</x-label>
                                <img width="200px" src="{{ asset('storage/' .$product->image) }}" alt="image"><br>
                                
                                <x-label for="image">{{ trans('products.image') }}</x-label>
                                <x-input id="image" type="file" name="image" value="{{$product->image}}"/><br>

                                <x-label for="name">{{ trans('products.name') }}</x-label>
                                <x-input type="text" name="name" value="{{old('name', $product->name)}}"/><br>   

                                <x-label for="description">{{ trans('products.description') }}</x-label>
                                <textarea class="rounded-md border-gray-300" name="description" rows="5">{{ old('description', $product->description) }}</textarea>

                                <x-label for="price">{{ trans('products.price') }}</x-label>
                                <x-input type="text" name="price" value="{{ old('price', $product->price) }}"/><br>

                                <x-label for="stock">{{ trans('products.stock') }}</x-label>
                                <x-input type="text" name="stock" value="{{ old('stock', $product->stock) }}"/><br>

                                <x-label for="category_id">{{ trans('products.category') }}</x-label>  
                                    <select class="rounded-md border-gray-300" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{$category->name }} </option>    
                                        @endforeach
                                    </select> 
                            </div><br>
                            <div class="mx-auto mb-4">
                                <x-button>{{ trans('buttons.save') }}</x-button>
                            </div>
                        </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>