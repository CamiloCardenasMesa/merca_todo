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
                            <x-input type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="email">{{ trans('auth.email') }}</x-label>
                            <x-input type="email" name="email" id="email" value="{{ old('email') }}"/>
                            @error('email')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="password">{{ trans('auth.password') }}</x-label>
                            <x-input type="password" name="password" id="password"/>
                            @error('password')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="confirm-password">{{ trans('auth.confirm_password') }}</x-label>
                            <x-input type="password" name="confirm-password" id="confirm-password"/>
                        </div>

                        <div class="flex flex-grow flex-col">
                            <x-label for="roles">{{ trans('auth.role') }}</x-label>
                            <x-select name="roles" id="roles" 
                                :options="[
                                    'admin' => __('role.admin'),
                                    'guest' => __('role.guest'),
                                    'buyer' => __('role.buyer'),
                                ]" 
                            />
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

