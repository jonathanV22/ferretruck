<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>

    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> 
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-5">
            <x-success-message class="mb-4"></x-success-message>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{url('/roles/'.$role->id)}}"  >
                @method('PUT')
                @csrf    
                <!-- Name -->
                <div>
                    <x-label for="nombre" :value="__('Nombre rol')" />
    
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{$role->nombre}}" required autofocus />
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