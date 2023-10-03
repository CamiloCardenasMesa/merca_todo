    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ ucwords($product->name) }}
        </h2>
    </x-slot>

    <x-article-layout>
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="basis-2/5">
                <img class="rounded-lg shadow-sm" id="product_image" src="{{ asset('storage/' .$product->image) }}" alt="image" />
            </div>
            <div class="flex-1">
                <div class="bg-gray-100 p-6 rounded-lg shadow-sm mb-6">
                    <x-label for="description">{{ trans('products.description') }}</x-label>
                    <p id="description">{{ $product->description }}</p>
                </div>
                <x-section>
                    <div class="flex flex-col">
                        <x-label for="price">{{ trans('products.price') }}</x-label>
                        <x-input id="price" value="{{ $product->price }}" disabled></x-input>
                    </div>
        
                    <div class="flex flex-col">
                        <x-label for="stock">{{ trans('products.stock') }}</x-label>
                        <x-input id="stock" value="{{ $product->stock }}" disabled></x-input>
                    </div>
        
                    <div class="flex flex-col">
                        <x-label for="category">{{ trans('products.category') }}</x-label>
                        <x-input id="category" value="{{ $product->category->name }}" disabled></x-input>
                    </div>
        
                    <div class="flex flex-col">
                        <x-label for="created_at">{{ trans('products.created_at') }}</x-label>
                        <x-input id="created_at" value="{{ $product->created_at }}" disabled></x-input>
                    </div>
                    
                    <div class="flex flex-col">
                        <x-label for="updated_at">{{ trans('products.updated_at') }}</x-label>
                        <x-input id="updated_at" value="{{ $product->updated_at }}" disabled></x-input>
                    </div>
        
                    <div class="flex flex-col">
                        <x-label for="product_enable">{{ trans('products.status') }}</x-label>
                        <x-input id="product_enable" value="{{ trans('products.' . ( $product->enable ? 'enable' : 'disable')) }}" disabled></x-input>
                    </div>
                </x-section>
            </div>
        </div>
        
        <div class="flex items-center justify-start mt-6 gap-3">
            <x-button-link href="{{ route('admin.products.index') }}">{{ trans('buttons.back') }}</x-button-link>
            @can(App\Constants\Permissions::PRODUCT_EDIT)
            <x-button-link href="{{ route('admin.products.edit', $product) }}">{{ trans('buttons.edit') }}</x-button-link>
            @endcan
        </div>
    </x-article-layout>
</x-app-layout>
