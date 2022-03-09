
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.index') }}" method="GET"> 
                <x-input type="text" name="query" placeholder="Busca un usuario" />
                <x-button class="ml-2">Buscar</x-button>
            </form><br>
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 px-4 py-2">Nombre</th>
                                <th class="border border-gray-400 px-4 py-2">Email</th>
                                <th class="border border-gray-400 px-4 py-2">Email verificado</th>
                                <th class="border border-gray-400 px-4 py-2">Ver</th>
                                <th class="border border-gray-400 px-4 py-2">Editar</th>
                                <th class="border border-gray-400 px-4 py-2">Estado</th>
                                <th class="border border-gray-400 px-4 py-2">Eliminar</th>
                            </tr>
                        </thead>  
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $user->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $user->email }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $user->email_verified_at }}</td> 
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.users.show', $user) }}">Ver</x-button-link>
                                    </td> 
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.users.edit', $user) }}">Editar</x-button-link>            
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-auth-validation-errors :errors="$errors"/>
                                        <form action="{{ route('admin.users.toggle', $user) }}" method="POST"> 
                                            @csrf   
                                            {{ method_field('PUT') }}                                     
                                            <x-button type="submit" >{{ $user->enable ? 'Deshabilitar' : 'Habilitar' }}</x-button>
                                        </form>                             
                                    </td> 
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"> 
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <x-button href="{{ route('admin.users.index', $user) }}" onclick="return confirm ('¿Seguro que quieres eliminar este usuario?')">Eliminar</x-button>
                                        </form>                             
                                    </td> 
                                </tr>                                              
                            </tbody>
                        @endforeach
				    </table>
                </div>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>