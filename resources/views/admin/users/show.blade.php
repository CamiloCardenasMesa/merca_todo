<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>
<body>
   <table>
       <thead>
           <tr>
                <th>
                    <h3>Id</h3>
                </th>
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
                    <h3>Creado en:</h3>
               </th>
               <th>
                    <h3>Actualizado en:</h3>
               </th>
           </tr>
       </thead>
       <tbody>
                <tr>
                    <td>
                        {{ $user['id'] }}
                    </td>
                    <td>
                        {{ $user['name'] }}
                    </td>
                    <td>
                        {{ $user['email'] }}
                    </td>
                    <td>
                        {{ $user['email_verified_at'] }}
                    </td>
                    <td>
                        {{ $user['created_at'] }}
                    </td>
                    <td>
                        {{ $user['updated_at'] }}
                    </td>
                </tr>        
       </tbody>
   </table>
   <br>
   <a href="{{route('admin.users.index')}}" class="hover:text-gray-500">Volver</a>
</body>
<body>
<br>
</body>
</x-app-layout>