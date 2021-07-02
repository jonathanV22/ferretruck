<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">            
                <h1 class="text-4xl mt-4">Formulario de registro</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                @csrf
    
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                 <!-- Apellido -->
                 <div class="mt-4">
                    <x-label for="apellido" :value="__('Apellido')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus />
                </div>
                 <!-- foto -->
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir foto</label>
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider'>Seleccione una foto</p>
                                </div>
                            <input type='file' class="hidden" name="foto" :value="old('foto')"/>
                            </label>
                        </div>
                    </div>
                 <!-- RUT -->
                 <div class="mt-4">
                    <x-label for="rut" :value="__('Rut')" />
    
                    <x-input id="rut" class="block mt-1 w-full" type="text" name="rut" :value="old('rut')" required autofocus />
                </div>
                 <!-- Direccion -->
                 <div class="mt-4">
                    <x-label for="direccion" :value="__('Direccion')" />
    
                    <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus />
                </div>
                 <!-- Telefono -->
                 <div class="mt-4">
                    <x-label for="telefono" :value="__('Telefono')" />
    
                    <x-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required autofocus />
                </div>
                <!-- Radio button -->
                <div class="mt-4 radio-group">
                    <label>
                        <input type="radio" value=2 name="idTipoU" >
                        Cliente:
                        <span></span>
                    </label>
                    <label class="mx-4">
                        <input type="radio" value=3 name="idTipoU">
                        Pyme:
                        <span></span>
                    </label>
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
    
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-button class="ml-4" >
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>  
            <script src="js\jquery.js"></script>
            <script src="inputmask\dist\jquery.inputmask.js"></script>
            <script>
            $(document).ready(function(){
                var rut = document.getElementById("rut");
                $(rut).inputmask({
                    mask: '9{1,2}.9{3}.9{3}-(K|k|9)',
                    casing: 'upper',
                    clearIncomplete: true,
                    numericInput: true,
                    positionCaretOnClick: 'none'
                });
            });
            
            </script>     
    </x-auth-card>
</x-guest-layout>
