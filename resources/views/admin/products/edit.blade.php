<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ ucwords($product->name) }}
        </h2>
    </x-slot>

    <x-section-layout>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="flex basis-2/6">
                    <div class="flex flex-col bg-gray-100 rounded-lg justify-between">
                        <img class="rounded-lg" src="{{ asset('storage/' .$product->image) }}" alt="image">
                        <div class="p-2 md:p-6 lg:px-6 lg:py-5">
                            <x-label for="product_image">{{ trans('products.image') }}</x-label>
                            <x-input class="file:rounded-md file:shadow-sm file:border-gray-200 cursor-pointer" id="product_image" type="file" name="image" value="{{$product->image}}"/>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="grid bg-gray-100 p-6 rounded-lg shadow-sm mb-6">
                        <x-label for="product_description">{{ trans('products.description') }}*</x-label>
                        <textarea class="rounded-md border-gray-300" name="description" id="product_description" rows="6">
                            {{ old('product_description', $product->description) }}
                        </textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <x-section>
                        <x-edit-input-field label="{{ trans('products.name') }}" type="text" name="name"  value="{{ $product->name }}" />
                        <x-edit-input-field label="{{ trans('products.price') }}" type="number" name="price"  value="{{ $product->price }}" />
                        <x-edit-input-field label="{{ trans('products.stock') }}" type="number" name="stock"  value="{{ $product->stock }}" />
                        <x-edit-select-field label="{{ trans('products.category') }}" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-edit-select-field>
                    </x-section>
                </div>
            </div>
            <x-create-form-buttons route="{{ route('admin.products.index') }}" />
        </form>
    </x-section-layout>
</x-app-layout>
