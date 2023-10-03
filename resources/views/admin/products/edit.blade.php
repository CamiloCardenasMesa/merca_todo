<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ ucwords($product->name) }}
        </h2>
    </x-slot>

    <x-article-layout>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="flex basis-2/6">
                    <div class="flex flex-col bg-gray-100 rounded-lg justify-between">
                        <img class="rounded-lg shadow-sm" src="{{ asset('storage/' .$product->image) }}" alt="image">
                        <div class="p-2 md:p-6 lg:px-6 lg:py-5">
                            <x-label for="product_image">{{ trans('products.image') }}</x-label>
                            <x-input class="rounded-md border-gray-300" id="product_image" type="file" name="image" value="{{$product->image}}"/>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="grid bg-gray-100 p-6 rounded-lg shadow-sm mb-6">
                        <x-label for="product_description">{{ trans('products.description') }}</x-label>
                        <textarea class="rounded-md border-gray-300" name="description" id="product_description" rows="6">
                            {{ old('description', $product->description) }}
                        </textarea>
                    </div>
                    <x-section>
                        @foreach (['name', 'price', 'stock'] as $field)
                            <div class="flex flex-grow flex-col">
                                <x-label for="{{ $field }}">{{ trans('products.' . $field) }}</x-label>
                                <x-input id="{{ $field }}" type="{{ $field == 'price' || $field == 'stock' ? 'number' : 'text' }}" name="{{ $field }}" value="{{ old($field, $product->$field) }}"/>
                            </div>
                        @endforeach
                    
                        <div class="flex flex-grow flex-col">
                            <x-label for="category_id">{{ trans('products.category') }}</x-label>
                            <select id="category_id" name="category_id" class="rounded-md border-gray-200 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </x-section>
                </div>
            </div>

            <div class="flex items-center justify-start mt-6 gap-3">
                <x-button-link href="{{ route('admin.products.index') }}">{{ trans('buttons.back') }}</x-button-link>
                <x-button>{{ trans('buttons.save') }}</x-button>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>
