<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:pb-0 justify-between">
            <div class="{{ session('status') ? 'mb-3 sm:mb-0 sm:mr-3' : '' }}">
                {{ $user->name }}
            </div>
            <x-auth-session-status :status="session('status')" />
        </div>             
    </x-slot>

    <x-article-layout>
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <x-label for="name">{{ trans('auth.email') }}</x-label>
                    <x-input id="name" value="{{ $user->email }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="phone">{{ trans('users.phone') }}</x-label>
                    <x-input id="phone" value="{{ $user->phone }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="birthday">{{ trans('users.birthday') }}</x-label>
                    <x-input id="birthday" value="{{ $user->birthday }}" disabled></x-input>
                </div>

                <div class="flex flex-col">
                    <x-label for="address">{{ trans('users.address') }}</x-label>
                    <x-input id="address" value="{{ $user->address }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="city">{{ trans('users.city') }}</x-label>
                    <x-input id="city" value="{{ $user->city }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="country">{{ trans('users.country') }}</x-label>
                    <x-input id="country" value="{{ $user->country }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="role">{{ trans('auth.role') }}</x-label>
                    <input id="role" name='role' value="{{ trans('role.' . $role) }}" disabled />
                </div>
                <div class="flex flex-col">
                    <x-label for="enable">{{ trans('users.status') }}</x-label>
                    <x-input id="enable" value="{{ trans('users.' . ( $user->enable ? 'enable' : 'disable')) }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="created_at">{{ trans('auth.created_at') }}</x-label>
                    <x-input id="created_at" value="{{ $user->created_at }}" disabled></x-input>
                </div>
                <div class="flex flex-col">
                    <x-label for="updated_at">{{ trans('auth.updated_at') }}</x-label>
                    <x-input id="updated_at" value="{{ $user->updated_at }}" disabled></x-input>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-start mt-6 gap-3">
            <x-button-link href="{{ route('admin.users.index') }}">{{ trans('buttons.back') }}</x-button-link>
            @can(App\Constants\Permissions::USER_EDIT)
            <x-button-link href="{{ route('admin.users.edit', $user) }}">{{ trans('buttons.edit') }}</x-button-link>
            @endcan
        </div>
    </x-article-layout>
</x-app-layout>
