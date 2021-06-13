<x-app-layout>
    <x-slot name="header">
        <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>
    <div class="flex mb-4">
        <div class="w-1/3"></div>
        <div class="w-1/3" >
            <div class="grid mt-8  gap-2 grid-cols-1">
                <div class="flex flex-col ">
                    <div class="bg-white shadow-md rounded-3xl p-5">                
                        <div class="mt-5">
                            <form action="{{url('/categorias/'.$categoria->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">Nombre<abbr title="required">*</abbr></label>
                                        <input placeholder="Ingrese nombre categoria" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="nombreCat" id="nombreCat" value="{{$categoria->nombreCat}}">
                                    </div>
                                </div>
                                <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                    <label class="font-semibold text-gray-600 py-2">Description</label>
                                    <textarea required="" name="descripcionCat" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block  bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Ingresa descripcion de la categoria" spellcheck="false" >{{$categoria->descripcionCat}}</textarea>                                    
                                </div>
                                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">                                   
                                    <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Guardar</button>
                                </div>
                            </form> 
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3"></div>
      </div>
</x-app-layout>