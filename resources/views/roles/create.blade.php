<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight" >
            {{ trans('auth.header_role') }}
        </h2>
    </x-slot>

    <x-article-layout>
        <x-auth-session-status :status="session('status')" />
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <x-section>
                <div class="grid"><br>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <x-label for="role">{{ trans('auth.role') }}</x-label>
                        <x-input id="role" type="text" name="role" placeholder="{{ trans('placeholders.create_role') }}"/><br>

                        <div class="mb-6">
                            <strong>{{ trans('auth.permissions') }}</strong>
                        </div>

                        @foreach($permission as $value)
                            <div>
                                <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
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
