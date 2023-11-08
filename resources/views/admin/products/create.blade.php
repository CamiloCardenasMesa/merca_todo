<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('products.header') }}
        </div>
    </x-slot>

    <x-section-layout>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form-container>
                <x-create-input-field label="{{ trans('products.image') }}" name="image" type="file"/>
                <x-create-input-field label="{{ trans('products.name') }}" name="name" type="text" />
                <x-create-input-field label="{{ trans('products.description') }}" name="description" type="textarea" />
                <x-create-input-field label="{{ trans('products.price') }}" name="price" type="number" />
                <x-create-input-field label="{{ trans('products.stock') }}" name="stock" type="number" />
                <x-create-input-field label="{{ trans('products.category') }}" name="category_id" type="select" :options="$categories" />
            </x-form-container>
            <x-create-form-buttons route="{{ route('admin.products.index') }}" />
        </form>
    </x-section-layout>
</x-app-layout>
