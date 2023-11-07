<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ ucwords($product->name) }}
        </h2>
    </x-slot>

    <x-article-layout>
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="flex bg-gray-100 rounded-lg items-center basis-2/5">
                <img class="rounded-lg" id="product_image" src="{{ asset('storage/' .$product->image) }}" alt="image" />
            </div>
            <div class="flex-1">
                <div class="bg-gray-100 p-6 rounded-lg shadow-sm mb-6">
                    <x-label for="description">{{ trans('products.description') }}</x-label>
                    <p id="description">{{ $product->description }}</p>
                </div>
                <x-section>
                    <x-disabled-input-field value="{{ $product->price }}" label="{{ trans('products.price') }}" name="price" />
                    <x-disabled-input-field value="{{ $product->stock }}" label="{{ trans('products.stock') }}" name="stock" />
                    <x-disabled-input-field value="{{ $product->category->name }}" label="{{ trans('products.category') }}" name="category" />
                    <x-disabled-input-field value="{{ $product->created_at }}" label="{{ trans('products.created_at') }}" name="created_at" />
                    <x-disabled-input-field value="{{ $product->updated_at }}" label="{{ trans('products.updated_at') }}" name="updated_at" />
                    <x-disabled-input-field value="{{ trans('products.' . ( $product->enable ? 'enable' : 'disable')) }}" label="{{ trans('products.status') }}" name="product_enable" />
                </x-section>
            </div>
        </div>
        <x-show-form-buttons route="{{ route('admin.products.index') }}">
            @can(App\Constants\Permissions::PRODUCT_EDIT)
                <x-button-actions 
                    route="{{ route('admin.products.edit', $product) }}" 
                    hoverBgClass="hover:bg-blue-500" 
                    svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />' 
                    text="{{ trans('buttons.edit') }}"
                />             
            @endcan
        </x-show-form-buttons>
    </x-article-layout>
</x-app-layout>
