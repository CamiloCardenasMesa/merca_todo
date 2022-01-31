
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-12 py-2 bg-white border-b border-gray-200">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4">
                        <div class="grid grid-rows-1 gap-1 mb-2"><br>
                            <x-label for="name">Nombre: </x-label>
                            <x-input type="text" name="name" value="{{ $user->name }}" required/><br>                                
                            <x-label for="email">Email: </x-label>
                            <x-input type="text" name="email" value="{{ $user->email }}" required/>
                        </div>
                        <div class="mx-auto mb-4">
                            <x-button>Guardar</x-button>
                        </div>
                    </div>      
                </form>
             </div>
         </div>
    </div>
</div>  
</x-app-layout>
