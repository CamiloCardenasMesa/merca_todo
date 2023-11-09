<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ ucwords($user->name) }}
        </h2>
    </x-slot>
    <x-section-layout>
        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form-container>
                <x-edit-input-field label="{{ trans('auth.name') }}" type="text" name="name"  value="{{ $user->name }}" />
                <x-edit-input-field label="{{ trans('auth.email') }}" type="email" name="email" value="{{ $user->email }}"/>
                <x-edit-input-field label="{{ trans('auth.password') }}" type="password" name="password"/>
                <x-edit-input-field label="{{ trans('auth.confirm_password') }}" type="password" name="confirm_password"/>
                <x-edit-input-field label="{{ trans('users.phone') }}" type="text" name="phone"  value="{{ $user->phone }}"/>
                <x-edit-input-field label="{{ trans('users.address') }}" type="text" name="address"  value="{{ $user->address }}"/>
                <x-edit-input-field label="{{ trans('users.birthday') }}" type="date" name="birthday"  value="{{ $user->birthday }}"/>
                <x-edit-input-field label="{{ trans('users.city') }}" type="text" name="city"  value="{{ $user->city }}" />
                <x-edit-input-field label="{{ trans('users.country') }}" type="text" name="country"  value="{{ $user->country }}" />
                <x-edit-select-field label="{{ trans('auth.role') }}" id="role" name="roles">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $role->name == old('roles', $user->getRoleNames()->first()) ? 'selected' : '' }}>
                            {{ trans('role.' . $role->name) }}
                        </option>
                    @endforeach
                </x-edit-select-field>
            </x-form-container>
            <x-create-form-buttons route="{{ route('admin.users.index') }}" />
        </form>
    </x-section-layout>
</x-app-layout>
