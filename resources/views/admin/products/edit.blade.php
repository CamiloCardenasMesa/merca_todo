
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('products.product_name') . $product->name }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-9 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1">
                            <div class="grid grid-rows-1 gap-3">
                                <x-label for="image">{{ trans('products.current_image') }}</x-label>
                                <img class="rounded-md border-gray-300"  width="200px" src="{{ asset('storage/' .$product->image) }}" alt="image">

                                <x-label for="image">{{ trans('products.image') }}</x-label>
                                <x-input class="rounded-md border-gray-300" id="image" type="file" name="image" value="{{$product->image}}"/>

                                <x-label for="name">{{ trans('products.name') }}</x-label>
                                <x-input type="text" name="name" value="{{old('name', $product->name)}}"/>

                                <x-label for="description">{{ trans('products.description') }}</x-label>
                                <textarea class="rounded-md border-gray-300" name="description" id="description" rows="5">
                                    {{ old('description', $product->description) }}
                                </textarea>

                                <x-label for="price">{{ trans('products.price') }}</x-label>
                                <x-input type="text" name="price" value="{{ old('price', $product->price) }}"/>

                                <x-label for="stock">{{ trans('products.stock') }}</x-label>
                                <x-input type="text" name="stock" value="{{ old('stock', $product->stock) }}"/>

                                <x-label for="category_id">{{ trans('products.category') }}</x-label>
                                <select class="rounded-md border-gray-300" name="category_id" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{$category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
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
