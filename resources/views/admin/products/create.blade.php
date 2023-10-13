<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('products.header') }}
        </div>
    </x-slot>

    <x-article-layout>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-section>
                <x-input-field label="{{ trans('products.image') }}" name="image" type="file"/>
                <x-input-field label="{{ trans('products.name') }}" name="name" type="text" />
                <x-input-field label="{{ trans('products.description') }}" name="description" type="textarea" />
                <x-input-field label="{{ trans('products.price') }}" name="price" type="number" />
                <x-input-field label="{{ trans('products.stock') }}" name="stock" type="number" />
                <x-input-field label="{{ trans('products.category') }}" name="category_id" type="select" :options="$categories" />
            </x-section>
            <x-create-form-buttons route="{{ route('admin.products.index') }}" />
        </form>
    </x-article-layout>
</x-app-layout>
