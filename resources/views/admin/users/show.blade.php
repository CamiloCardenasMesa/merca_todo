<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:pb-0 justify-between">
            <div class="{{ session('status') ? 'mb-3 sm:mb-0 sm:mr-3' : '' }}">
                {{ ucwords($user->name) }}
            </div>
            <x-auth-session-status :status="session('status')" />
        </div>             
    </x-slot>

    <x-section-layout>
        <x-section>
            <x-disabled-input-field value="{{ $user->email }}" label="{{ trans('auth.email') }}" name="email" />
            <x-disabled-input-field value="{{ $user->phone }}" label="{{ trans('users.phone') }}" name="phone" />
            <x-disabled-input-field value="{{ $user->birthday }}" label="{{ trans('users.birthday') }}" name="birthday" />
            <x-disabled-input-field value="{{ $user->address }}" label="{{ trans('users.address') }}" name="address" />
            <x-disabled-input-field value="{{ $user->city }}" label="{{ trans('users.city') }}" name="city" />
            <x-disabled-input-field value="{{ $user->country }}" label="{{ trans('users.country') }}" name="country" />
            <x-disabled-input-field value="{{ trans('role.' . $role) }}" label="{{ trans('auth.role') }}" name="role" />
            <x-disabled-input-field value="{{ trans('users.' . ( $user->enable ? 'enable' : 'disable')) }}" label="{{ trans('users.status') }}" name="enable" />
            <x-disabled-input-field value="{{ $user->created_at }}" label="{{ trans('auth.created_at') }}" name="created_at" />
            <x-disabled-input-field value="{{ $user->updated_at }}" label="{{ trans('auth.updated_at') }}" name="updated_at" />
        </x-section>
        <x-show-form-buttons route="{{ route('admin.users.index') }}">
            @can(App\Constants\Permissions::USER_EDIT)
            <x-button-actions 
                route="{{ route('admin.users.edit', $user) }}" 
                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />' 
            /> 
            @endcan
        </x-show-form-buttons>
    </x-section-layout>
</x-app-layout>
