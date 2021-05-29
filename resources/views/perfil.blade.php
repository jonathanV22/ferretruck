<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <x-auth-validation-errors class="mb-4" :errors="$errors" />
                 <x-success-message class="mb-4"></x-success-message>
                   <form action="{{route('perfil.update')}}" method="post">
                       @method('PUT')
                       @csrf
                       <div class="grid grid-cols-2 gap-6">
                        <div class="grid grid-rows-3 gap-6">
                            <div>
                                <x-label for="name" :value="__('Name')"></x-label>
                                <x-input class="block mt-1 w-full" type="text" name="name"
                                        value="{{ auth()->user()->name }}" autofocus></x-input>
                            </div>
                            <div>
                            <x-label for="email" :value="__('Email')"></x-label>
                            <x-input class="block mt-1 w-full" type="email" name="email"
                                        value="{{ auth()->user()->email }}" readonly
                                        ></x-input>
                            </div>
                            <div>
                                <x-label for="rut" :value="__('RUT')"></x-label>
                                <x-input class="block mt-1 w-full" type="text" name="rut"
                                            value="{{ auth()->user()->rut }}"></x-input>
                                </div>
                        </div>
                        <div class="grid grid-rows-3 gap-6">
                            <div>
                                <x-label for="apellido" :value="__('Apellido')"></x-label>
                                <x-input class="block mt-1 w-full" type="text" name="apellido"
                                        value="{{ auth()->user()->apellido }}" autofocus></x-input>
                            </div>
                            <div>
                            <x-label for="direccion" :value="__('Direccion')"></x-label>
                            <x-input class="block mt-1 w-full" type="text" name="direccion"
                                        value="{{ auth()->user()->direccion }}"></x-input>
                            </div>
                            <div>
                                <x-label for="telefono" :value="__('Telefono')"></x-label>
                                <x-input class="block mt-1 w-full" type="number" name="telefono"
                                            value="{{ auth()->user()->telefono }}"></x-input>
                                </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3 bg-gray-800 hover:bg-green-500">
                            Actualizar
                        </x-button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>