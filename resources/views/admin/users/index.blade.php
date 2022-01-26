
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
   <table>
       <thead>
           <tr>
               <th>
                    <h3>Nombre</h3> 
               </th>
               <th>
                    <h3>Email</h3>
               </th>
               <th>
                    <h3>Email verificado</h3>
               </th>
               <th>
                   <h3>Editar</h3>
               </th>
               <th>
                   <h3>Ver</h3>
               </th>
           </tr>
       </thead>
       <tbody>
           @foreach ($users as $user )
                <tr>
                    <td>
                        {{ $user->name  }}
                    </td>
                    <td>
                        {{ $user->email  }}
                    </td>
                    <td>
                        {{ $user->email_verified_at  }}
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}"  class="hover:text-gray-500">Editar</a>
                    </td>
                    <td> 
                        <a href="{{ route('admin.users.show', $user) }}"  class="hover:text-gray-500">ver</a>
                    </td>
                </tr> 
            @endforeach     
       </tbody>
   </table>
</body>
<body>
<br>
</x-app-layout>
