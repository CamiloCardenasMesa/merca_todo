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
                <x-auth-validation-errors :errors="$errors" />
                <div>
                    <div>
                        <x-label for="name">{{ trans('auth.name') }}</x-label>
                        <x-input type="text" name="name" value="{{ $role->name }}"/>
                    </div><br>
                    <strong>{{ trans('auth.permissions') }}</strong>
                    @foreach($permission as $value)
                    <div>
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                            {{ $value->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </x-section>
            <div class="flex items-center justify-start mt-6 gap-3">
                <x-button-link href="{{ route('roles.index') }}">{{ trans('buttons.back') }}</x-button-link>
                <x-button>{{ trans('buttons.save') }}</x-button>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>
