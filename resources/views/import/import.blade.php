<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.import') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <x-article-layout>
        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger mb-10 " role="alert">
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>
        <form action="{{ route('admin.products.import.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="import_file">
                <x-button class="ml-2">IMPORT</x-button>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>
