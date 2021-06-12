<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>
    <div class="flex h-screen bg-gray-200 items-center justify-center ">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
      
          <div class="flex justify-center my-4">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar registro</h1>
            </div>
          </div>
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <form method="POST" action="{{url('/users/'.$user->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" type="text" placeholder="ingrese nombre" name="name" value="{{$user->name}}"/>
                  </div>
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" type="text" placeholder="ingrese apellido" name="apellido" value="{{$user->apellido}}"/>
                  </div>
                </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Rut</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" type="text" placeholder="Ingrese Rut"name="rut" value="{{$user->rut}}" />
                  </div>
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" type="email" placeholder="Ingrese email" name="email" value="{{$user->email}}"/>
                  </div>
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Dirección</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" type="text" placeholder="Ingrese direccion" name="direccion" value="{{$user->direccion}}" />
                  </div>
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Telefono</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" type="text" placeholder="Ingrese telefono" name="telefono" value="{{$user->telefono}}"/>
                  </div>
              </div>
             
              <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Seleccione un rol</label>
              <select class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent" name="idTipoU">
                @forelse ($roles as $rol)
                <option value="{{$rol->id_r}}">{{$rol->nombre}}</option>
                @empty
                <option :value="old('')">No existen roles</option>         
                @endforelse
                <option :value="old('')" selected>Seleccionar</option>
              </select>
              </div>                     
              <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir foto</label>
                  <div class='flex items-center justify-center w-full'>
                      <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-300 group'>
                          <div class='flex flex-col items-center justify-center pt-7'>
                            @if (isset($user->foto))
                            <div>
                              <img src="{{ asset('storage').'/'.$user->foto}}" alt="foto perfil" class="w-20 h-20 mr-8 ml-8 object-center">
                            </div>  
                            @else
                            <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider'>Seleccione una foto</p>                          
                            @endif   
                          </div>
                      <input type='file' class="hidden" name="foto" :value=""/>
                      </label>
                  </div>
              </div>  
              <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <button class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Aceptar</button>
              </div>
          </form>
          </div>
      </div>
</x-app-layout>