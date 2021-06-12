<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-scree flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <a href="{{url('users/create')}}" >
                    <x-button class="ml-3 bg-gray-800 hover:bg-blue-700 max-w-full my-4">
                        Agregar usuario
                    </x-button>
                  </a>
                <div class="bg-white shadow-md rounded my-6">                   
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">Id</th>
                                <th class="py-3 px-6 text-center">Nombre</th>
                                <th class="py-3 px-6 text-center">Correo</th>
                                <th class="py-3 px-6 text-center">Foto</th>
                                <th class="py-3 px-6 text-center">Telefono</th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{isset($user->id)?$user->id:'no tiene id'}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{isset($user->name)?$user->name:'No cuenta'}} {{isset($user->apellido)?$user->apellido:'con nombre'}} </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{isset($user->email)?$user->email:'No tiene email'}}</span>
                                </td>
                                <td>
                                    @if (isset($user->foto))
                                    <img src="{{ asset('storage').'/'.$user->foto}}" alt="foto perfil" class="w-14 h-14 mr-8 ml-8 object-center">
                                    @else
                                    <span class="py-1 px-3">No tiene imagen</span>
                                    @endif                                    
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{isset($user->telefono)?$user->telefono:'No tiene un Telefono'}}</span>
                                </td>  
                                
                                <td class="py-3 px-6 text-center">

                                    <a href="{{url('/users/'.$user->id.'/edit')}}">Editar</a>

                                    <form action="{{url('/users/'.$user->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf                                                                                   
                                        <input type='submit'  onclick="return(confirm('Seguro que decea borrar al usuario '))"value="Borrar">                                              
                                    </form> 
                                </td>
                            </tr>                             
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>