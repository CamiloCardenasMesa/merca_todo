<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('auth.header') }}
            <x-auth-session-status class="flex text-center" :status="session('status')" />
        </div>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-rows-1 gap-3">
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
                            <div class="mx-auto">
                                <x-button>{{ trans('buttons.save') }}</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

