<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>

    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> 
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-5">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{url('/productos')}}"  enctype="multipart/form-data" >
                @csrf    
                <!-- Name -->
                <div>
                    <x-label for="nombre" :value="__('Name')" />
    
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
                </div>    
                <!-- Foto -->
                <div class="mt-4">
                    <x-label for="imagen" :value="__('Foto')" />
    
                    <x-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')" required autofocus />
                </div>
                    <!-
                    <!-- Marca -->
                <div class="mt-4">
                    <x-label for="marca" :value="__('Marca')" />
    
                    <x-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca')" required autofocus />
                </div>
                    <!-- Descripcion -->
                    <div class="mt-4">
                    <x-label for="descripcion" :value="__('Descripción')" />
    
                    <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required autofocus />
                </div>
                    <!-- Precio -->
                <div class="mt-4">
                    <x-label for="precio" :value="__('Precio')" />
    
                    <x-input id="precio" class="block mt-1 w-full" type="number" name="precio" :value="old('precio')" required autofocus />
                </div>
                
                    <!-- Telefono -->
                <div class="mt-4">
                    <x-label for="stock" :value="__('Stock')" />
    
                    <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock')" required autofocus />
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