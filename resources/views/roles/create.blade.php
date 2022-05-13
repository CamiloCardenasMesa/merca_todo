<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('auth.header_role') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-auth-session-status :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" py-8 bg-white border-b border-gray-200 px-12">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div class="grid gap-1"><br>
                                <x-label for="name">{{ trans('auth.role') }}</x-label>
                                <x-input type="text" name="name" placeholder="{{ trans('placeholders.create_role') }}"/><br>
    
                                <div class="mb-6">
                                    <strong>{{ trans('auth.permissions') }}</strong>
                                </div>
    
                                @foreach($permission as $value)
                                    <div>     
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                            {{ $value->name }}</label>
                                    </div>
                                @endforeach
                                <div class="flex justify-center gap-2 mt-6">
                                    <x-button-link href="{{ route('roles.index') }}">{{ trans('buttons.back') }}</x-button-link>
                                    <x-button>{{ trans('buttons.save') }}</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
