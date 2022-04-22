
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('products.header') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class=" py-8 bg-white border-b border-gray-200 px-12">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div class="grid grid-rows-1 gap-1 mb-2">
                            <br>
                            <x-label for="image">{{ trans('products.image') }}</x-label>
                            <x-input type="file" name="image" required/>
                            @error('image')
                                    <small>*{{ $message }}</small>
                                @enderror
                            <br>
                            <x-label for="name">{{ trans('products.name') }}</x-label>
                            <x-input type="text" name="name" value="{{old('name')}}"/>
                                @error('name')
                                    <small>*{{ $message }}</small>
                                @enderror
                            <br>
                            <x-label for="description">{{ trans('products.description') }}</x-label>
                            <textarea name="description" rows="5">{{old('description')}}</textarea>
                            @error('description')
                            <small>*{{ $message }}</small>
                            @enderror
                            <br>
                            <x-label for="price">{{ trans('products.price') }}</x-label>
                            <x-input type="text" name="price" value="{{old('price')}}"/>
                                @error('price')
                                    <small>*{{ $message }}</small>
                                @enderror
                            <br>
                            <x-label for="stock">{{ trans('products.stock') }}</x-label>
                            <x-input type="text" name="stock" value="{{old('stock')}}"/>
                                @error('stock')
                                    <small>*{{ $message }}</small>
                                @enderror 
                            <br>
                            <x-label for="category_id">{{ trans('products.category') }}</x-label>  
                                <select name="category_id">
                                    @foreach ($categories as $category)
                                    <option value={{ $category->id }}> {{ $category->name }} </option>    
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