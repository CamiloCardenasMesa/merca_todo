<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 px-4 py-2">Id</th>
                                <th class="border border-gray-400 px-4 py-2">Nombre</th>
                                <th class="border border-gray-400 px-4 py-2">Email</th>
                                <th class="border border-gray-400 px-4 py-2">Email verificado</th>
                                <th class="border border-gray-400 px-4 py-2">Fecha de creación:</th>
                                <th class="border border-gray-400 px-4 py-2">Fecha de actualización:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 text-center">{{ $user->id }}</th>
                                <td class="border border-gray-400 px-4 py-2 text-center">{{ $user->name }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center">{{ $user->email }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center">{{ $user->email_verified_at }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center">{{ $user->created_at }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center">{{ $user->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table><br>
                        <div class="flex justify-center">
                            <a href="{{route('admin.users.index')}}"> <x-button>Volver</x-button>
                        </div>                     
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>