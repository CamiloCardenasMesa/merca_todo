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
                <div>
                    <x-auth-validation-errors class="mb-6" :errors="$errors" />
                    <div class="mb-6">
                        <x-label for="name">{{ trans('auth.role') }}</x-label>
                        <x-input id="name" type="text" name="name" placeholder="{{ trans('placeholders.create_role') }}"/>
                    </div>
                    <x-label value="{{ trans('auth.permissions') }}" />
                        @foreach($permission as $value)
                        <div>
                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
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
