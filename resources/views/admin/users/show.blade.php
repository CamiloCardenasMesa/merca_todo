<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:pb-0 justify-between">
            <div class="{{ session('status') ? 'mb-3 sm:mb-0 sm:mr-3' : '' }}">
                {{ ucwords($user->name) }}
            </div>
            <x-auth-session-status :status="session('status')" />
        </div>             
    </x-slot>

    <x-article-layout>
        <x-section>
            <div class="flex flex-col">
                <x-label for="email">{{ trans('auth.email') }}</x-label>
                <x-input id="email" value="{{ $user->email }}" disabled></x-input>
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
        </x-section>
        <div class="flex items-center justify-start mt-6 gap-3">
            <x-button-link href="{{ route('admin.users.index') }}">{{ trans('buttons.back') }}</x-button-link>
            @can(App\Constants\Permissions::USER_EDIT)
            <x-button-actions 
                route="{{ route('admin.users.edit', $user) }}" 
                hoverBgClass="hover:bg-blue-500" 
                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />' 
                text="{{ trans('buttons.edit') }}"
            /> 
            @endcan
        </div>
    </x-article-layout>
</x-app-layout>
