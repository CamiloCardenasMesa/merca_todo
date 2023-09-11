<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('auth.header') }}
        </h2>
        <x-auth-session-status class="flex text-center" :status="session('status')" />
    </x-slot>

    <div class="py-12 min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" py-8 bg-white border-b border-gray-200 px-12">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div class="grid grid-rows-1 gap-1 mb-2"><br>
                                <x-label for="name">{{ trans('auth.name') }}</x-label>
                                <x-input type="text" name="name" value="" />

                                <x-label for="email">{{ trans('auth.email') }}</x-label>
                                <x-input type="text" name="email" value="" />

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

