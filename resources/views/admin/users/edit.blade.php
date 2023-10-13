<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
           Estás editando al usuario {{ ucwords($user->name) }}
        </h2>
    </x-slot>
    <x-article-layout>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-section>
                <x-edit-input-field label="{{ trans('auth.name') }}" type="text" name="name"  value="{{ $user->name }}" />
                <x-edit-input-field label="{{ trans('auth.email') }}" type="email" name="email" value="{{ $user->email }}"/>
                <x-edit-input-field label="{{ trans('auth.password') }}" type="password" name="password"/>
                <x-edit-input-field label="{{ trans('auth.confirm_password') }}" type="password" name="confirm_password"/>
                <x-edit-input-field label="{{ trans('users.phone') }}" type="text" name="phone"  value="{{ $user->phone }}"/>
                <x-edit-input-field label="{{ trans('users.address') }}" type="text" name="address"  value="{{ $user->address }}"/>
                <x-edit-input-field label="{{ trans('users.birthday') }}" type="date" name="birthday"  value="{{ $user->birthday }}"/>
                <x-edit-input-field label="{{ trans('users.city') }}" type="text" name="city"  value="{{ $user->city }}" />
                <x-edit-input-field label="{{ trans('users.country') }}" type="text" name="country"  value="{{ $user->country }}" />
                <div class="flex flex-grow flex-col">
                    <x-label for="role">{{ trans('auth.role') }}</x-label>
                    <select class="rounded-md border-gray-200 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="role" name="roles" >
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ $role->name == old('roles', $user->getRoleNames()->first()) ? 'selected' : '' }}>
                                {{ trans('role.' . $role->name ) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </x-section>
            <div class="flex items-center justify-start mt-6 gap-3">
                <x-button-link href="{{ route('admin.users.index') }}">{{ trans('buttons.cancel') }}</x-button-link>
                <x-button>{{ trans('buttons.save') }}</x-button>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>
