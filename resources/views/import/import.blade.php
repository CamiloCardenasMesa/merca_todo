<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('products.import') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>
    
    <x-section-layout>
        <x-form-container>
            <div class="flex flex-col items-center justify-center">
                <x-label value="{{ trans('products.template_message') }}"/>
                <x-button-link href="{{ asset('templates/import_template.xlsx') }}" download="import_template.xlsx">{{ trans('products.download_template') }}</x-button-link>
            </div>
            <div>
                <x-auth-validation-errors :errors="$errors" class="mb-4" />
                @if(session('error'))
                    <div class="font-medium text-red-600">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="justify-center" action="{{ route('admin.products.import.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-create-input-field label="{{ trans('products.import') }}" name="document" type="file"/>
                    <x-button class="mt-6">{{ trans('buttons.import_products') }}</x-button>
                </form>
            </div>
        </x-form-container>
    </x-section-layout>
</x-app-layout>
