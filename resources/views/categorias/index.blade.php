<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>

    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-scree flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <a href="{{url('categorias/create')}}" >
                    <x-button class="ml-3 bg-gray-800 hover:bg-blue-700 max-w-full my-4">
                        Agregar categoria
                    </x-button>
                  </a>
                <div class="bg-white shadow-md rounded my-6">                   
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">ID</th>
                                <th class="py-3 px-6 text-center">Nombre</th>
                                <th class="py-3 px-6 text-center">descripcion</th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @forelse ($categorias as $categoria)
                            <tr class="border-b border-gray-200 hover:bg-gray-100"> 
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{$categoria->id}}</span>
                                </td>                               
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-indigo-200 text-indigo-600 py-1 px-3 rounded-full text-xs">{{$categoria->nombreCat}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{$categoria->descripcionCat}}</span>
                                </td>  
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                            <a  href="{{url('/categorias/'.$categoria->id.'/edit')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>                                            
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <form action="{{url('/categorias/'.$categoria->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return(confirm('¿ Seguro que decea borra esta categoria?'))" >
                                                  <svg width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32" style="transform: rotate(360deg);">
                                                    <path d="M12 12h2v12h-2z" fill="currentColor"></path>
                                                    <path d="M18 12h2v12h-2z" fill="currentColor"></path>
                                                    <path d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20z" fill="currentColor"></path>
                                                    <path d="M12 2h8v2h-8z" fill="currentColor"></path>
                                                  </svg>
                                                </button>
                                              </form>  
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-b border-gray-200 hover:bg-gray-100"> 
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">No Exiten categorias</span>                                    
                                </td>                                                 
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>