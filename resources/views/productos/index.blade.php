<x-app-layout>
    <x-slot name="header">
      <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-scree flex items-center justify-center bg-gray-100 font-sans overflow-hidden mx-5">
            <div class="w-full lg:w-5/6 my-4">
                <a href="{{route('productos.create')}}" >
                    <x-button class="ml-3 bg-gray-800 hover:bg-blue-700 max-w-full mb-4">
                        Agregar producto
                    </x-button>
                </a>
                <div class="bg-white shadow-md rounded my-6">                   
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">ID</th>
                                <th class="py-3 px-6 text-center">Nombre</th>
                                <th class="py-3 px-6 text-center">Imagen</th>
                                <th class="py-3 px-6 text-center">Marca</th>
                                <th class="py-3 px-6 text-center">Descripción</th>
                                <th class="py-3 px-6 text-center">Precio</th>
                                <th class="py-3 px-6 text-center">Stock</th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @forelse ($productos as $producto) 
                            <tr>
                                <td class="py-3 px-6 text-center">
                                   <span class="py-1 px-3">{{ $producto->id}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{ $producto->nombre}}</span>
                                 </td>
                                 <td class="flex item-center justify-center text-center">
                                    @if (isset($producto->imagen))
                                    <img src="{{ asset('storage').'/'.$producto->imagen}}" alt="foto perfil"  class="w-14 h-14 mr-8 ml-8 ">
                                    @else
                                    <span class="py-1 px-3">No tiene imagen</span>
                                    @endif
                                 </td>
                                 <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{ $producto->marca}}</span>
                                 </td>
                                 <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3"> {{ $producto->descripcion}}</span>
                                 </td>
                                 <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">$ {{ $producto->precio}}</span>
                                 </td>
                                 <td class="py-3 px-6 text-center">
                                    <span class="py-1 px-3">{{ $producto->stock}}</span>
                                 </td>                                 
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <!--<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>-->
                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                            <a href="{{url('/productos/'.$producto->id.'/edit')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>                                           
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <form action="{{url('/productos/'.$producto->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return(confirm('¿ Seguro que decea borra este producto?'))" >
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
                            <tr>    
                                <div class="flex flex-col sm:justify-center items-center">
                                    <td>
                                        <p class="text-center">No Exiten productos</p> 
                                    </td>    
                                </div>                                                    
                            </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
