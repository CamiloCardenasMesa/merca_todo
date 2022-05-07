<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($role->name) }}
        </h2>
    </x-slot>

    <div class="grid justify-items-center py-12">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="px-10 pb-8 pt-10 bg-white border-b border-gray-200">
                <div class="form-group bg-gray-100 border border-gray-300 px-4 py-2 text-center font-bold rounded-lg">
                    {{ $role->name }}
                </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="bg-white text-center my-4">
                                <p>Permissions:</p>
                            </div>
                            <div class="rounded-lg p-2 bg-gray-100 border border-gray-300 ">
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <div class="bg-gray-100 text-left py-2 px-4">
                                        <li >{{ $v->description }}</li> 
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-6">
                        <a href="{{route('roles.index')}}"> <x-button>{{ trans('buttons.back') }}</x-button>
                    </div>  
                </div>                   
            </div>
        </div>
    </div>  
</x-app-layout>