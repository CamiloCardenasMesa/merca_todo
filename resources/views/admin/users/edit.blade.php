<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('users.user') . $user->name }}
        </h2>
    </x-slot>
    <div class="pb-12 min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-9 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1">
                            <div class="grid grid-rows-1 gap-3">
                                <x-label for="name">{{ trans('auth.name') }}</x-label>
                                <x-input type="text" name="name" value="{{ $user->name }}"/>

                                <x-label for="email">{{ trans('auth.email') }}</x-label>
                                <x-input type="text" name="email" value="{{ $user->email }}"/>

                                <x-label for="password">{{ trans('auth.password') }}</x-label>
                                <x-input type="text" name="password"/>

                                <x-label for="password">{{ trans('auth.confirm_password') }}</x-label>
                                <x-input type="text" name="confirm-password"/>

                                <x-label for="roles">{{ trans('auth.role') }}</x-label>
                                <select class="rounded-md border-gray-300" name="roles" id="roles">
                                    @foreach ($roles as $userRole)
                                        <option value="{{ $userRole }}">{{ $userRole }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mx-auto">
                                <x-button-link href="{{ route('admin.users.index') }}">{{ trans('buttons.back') }}
                                </x-button-link>
                                <x-button>{{ trans('buttons.save') }}</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
