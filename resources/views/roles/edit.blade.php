<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($role->name) }}
        </h2>
    </x-slot>
<div class="py-12 min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-12 py-8 bg-white border-b border-gray-200">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 gap-4">
                        <div class="grid gap-1"><br>
                            <x-label for="name">{{ trans('auth.name') }}</x-label>
                            <x-input type="text" name="name" value="{{ $role->name }}"/><br>

                            <div class="mb-6">
                                <strong>{{ trans('auth.permissions') }}</strong>
                            </div>

                            @foreach($permission as $value)
                            {{-- <label type="checkbox" id="{{ $value->id }}" value="{{ $value->name }}" >{{ $value->name }}</label> --}}
                           <div>     
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                    <br/>
                            @endforeach
                            </div>
                            <div class="flex justify-center gap-2 mt-6">
                                <x-button-link href="{{ route('roles.index') }}">{{ trans('buttons.back') }}</x-button-link>
                                <x-button>{{ trans('buttons.save') }}</x-button>
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>