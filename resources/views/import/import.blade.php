<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.import') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>
    
    <x-article-layout>
        <x-section>
            <div>
                <x-auth-validation-errors :errors="$errors" class="mb-4" />
                <form action="{{ route('admin.products.import.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-create-input-field label="{{ trans('products.import') }}" name="document" type="file"/>
                    <x-button class="mt-6">{{ trans('buttons.import_products') }}</x-button>
                </form>
            </div>
        </x-section>
    </x-article-layout>
</x-app-layout>
