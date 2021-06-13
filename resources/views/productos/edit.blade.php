<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> 
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-5">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{url('/productos/'.$producto->id)}}"  enctype="multipart/form-data" >
                @method('PUT')
                @csrf    
                <!-- Name -->
                <div>
                    <x-label for="nombre" :value="__('Name')" />
    
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{$producto->nombre}}" required autofocus />
                </div>    
                <!-- Foto -->
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir foto</label>
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                  @if (isset($producto->imagen))
                                  <div>
                                    <img src="{{asset('storage').'/'.$producto->imagen}}" alt="foto perfil" class="w-20 h-20 mr-8 ml-8 object-center">
                                  </div>  
                                  @else
                                    <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                  <p class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider'>Seleccione una foto</p>                          
                                  @endif   
                                </div>
                            <input type='file' class="hidden" name="imagen" value="{{$producto->imagen}}"/>
                            </label>
                        </div>
                    </div>  
                    
                    <!-- Marca -->
                <div class="mt-4">
                    <x-label for="marca" :value="__('Marca')" />
    
                    <x-input id="marca" class="block mt-1 w-full" type="text" name="marca" value="{{$producto->marca}}" required autofocus />
                </div>
                    <!-- Descripcion -->
                    <div class="mt-4">
                    <x-label for="descripcion" :value="__('Descripción')" />
    
                    <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" value="{{$producto->descripcion}}" required autofocus />
                </div>
                    <!-- Precio -->
                <div class="mt-4">
                    <x-label for="precio" :value="__('Precio')" />
    
                    <x-input id="precio" class="block mt-1 w-full" type="number" name="precio" value="{{$producto->precio}}" required autofocus />
                </div>
                
                    <!-- Telefono -->
                <div class="mt-4">
                    <x-label for="stock" :value="__('Stock')" />
    
                    <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{$producto->stock}}" required autofocus />
                </div>
                <div class="flex flex-col sm:justify-center items-center">
                    <x-button class="mt-4 m" >
                        {{ __('Aceptar') }}
                    </x-button>
                </div>
            </form>      
        </div>
    </div>
</x-app-layout>