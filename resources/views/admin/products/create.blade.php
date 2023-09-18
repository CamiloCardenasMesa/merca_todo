<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('products.header') }}
        </div>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex flex-grow flex-col">
                            <x-label for="image">{{ trans('products.image') }}</x-label>
                            <input class="file:rounded-md file:shadow-sm file:border-gray-100" type="file" name="image" id="image" required />
                            @error('image')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="name">{{ trans('products.name') }}</x-label>
                            <x-input type="text" name="name" id="name" value="{{ old('name') }}" />
                            @error('name')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="description">{{ trans('products.description') }}</x-label>
                            <textarea  class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" id="description">{{ old('description') }}</textarea>
                            @error('description')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="price">{{ trans('products.price') }}</x-label>
                            <x-input type="number" name="price" id="price" value="{{ old('price') }}" />
                            @error('price')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="stock">{{ trans('products.stock') }}</x-label>
                            <x-input type="number" name="stock" id="stock" value="{{ old('stock') }}" />
                            @error('stock')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="categories">{{ trans('products.category') }}</x-label>
                            <select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                            {{-- <x-select name="categories" :options="$categories" /> --}}
                        </div>
                        <div class="mt-9">
                            <x-button>{{ trans('buttons.save') }}</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
