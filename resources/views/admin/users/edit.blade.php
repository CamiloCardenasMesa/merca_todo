
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre: </label>
        <input type="text" name="name" value="{{ $user->name }}" required/>
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" value="{{ $user->email }}" required/>
        <br>
        <input type="submit" value="Guardar" class="hover:text-gray-500">
    </form>
</x-app-layout>
