<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('role.' . $role->name) }}
        </h2>
    </x-slot>

    <x-article-layout>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-section>
                <div>
                    <div class="mb-6">
                        <x-edit-input-field label="{{ trans('users.name') }}" type="text" name="name" value="{{ $role->name }}" />
                    </div>

                    <x-label value="{{ trans('auth.permissions') }}" />
                    @foreach($permission as $value)
                        <div>
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </x-section>
            <x-create-form-buttons route="{{ route('roles.index') }}" />
        </form>
    </x-article-layout>
</x-app-layout>
