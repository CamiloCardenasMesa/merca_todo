<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('auth.header') }}
        </div>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex flex-grow flex-col">
                            <x-label for="name">{{ trans('auth.name') }}</x-label>
                            <x-input type="text" name="name" value="{{ old('name') }}"/>
                            @error('name')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="email">{{ trans('auth.email') }}</x-label>
                            <x-input type="email" name="email" value="{{ old('email') }}"/>
                            @error('email')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="password">{{ trans('auth.password') }}</x-label>
                            <x-input type="password" name="password" value="{{ old('password') }}"/>
                            @error('password')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="confirm-password">{{ trans('auth.confirm_password') }}</x-label>
                            <x-input type="password" name="confirm-password" value="{{ old('confirm-password') }}"/>
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="roles">{{ trans('auth.role') }}</x-label>
                            <x-select name="roles" :options="$roles" />
                        </div>
                    </div>
                    <div class="mt-9">
                        <x-button>{{ trans('buttons.save') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

