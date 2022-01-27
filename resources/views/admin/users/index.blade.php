
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div>
        <div class="m-10 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead>
                        <th class="px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                        <th class="px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email verificado</th>
                        <th class="px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Editar</th>
                        <th class="px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ver</th>
                        <th class="px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Eliminar</th>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <div class="flex items-center">
                                <td class="p-2 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $user->name }}</p>
                                </td>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $user->email  }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $user->email_verified_at }}}</p>
                                </td> 
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a class="text-gray-900 whitespace-no-wrap" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                </td> 
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('admin.users.show', $user) }}">Ver</a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"> 
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button href="{{ route('admin.users.index', $user) }}">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </div>                     
                        </tbody>
                    @endforeach
				</table>
            </div>
        </div>
    </div>
    {{ $users->links() }}
</x-app-layout>