<x-app-layout>
    <x-slot name="header">
      <h1 class="text-black text-2xl">FERRETRUCK</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <a href="{{route('roles.create')}}" >
                    <x-button class="ml-3 bg-gray-800 hover:bg-blue-700 max-w-full mb-4">
                        Agregar Rol
                    </x-button>
                  </a>
                  <x-success-message class="mb-4"></x-success-message>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                ID
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                Nombre
                              </th>                              
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($roles as $role)
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $role->id_r}}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               {{ $role->nombre}}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end flex-row"> 
                                  <div class="flex-shrink">
                                    <a href="{{route('roles.show',$role ->id_r)}}">
                                      <x-button class="ml-3 bg-gray-800 hover:bg-blue-300 max-w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                      </x-button>
                                    </a>                                                                                
                                  </div>
                                    <div class="flex-shrink">
                                      <a href="{{route('roles.edit',$role->id_r)}}">
                                        <x-button class="ml-3 bg-gray-800 hover:bg-green-500 max-w-full">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                          </svg>
                                        </x-button>
                                      </a>                                                                                
                                    </div>
                                    <div class="">
                                      <a href="">
                                        <x-button class="ml-3 bg-gray-800 hover:bg-red-500 max-w-full">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                        </x-button>
                                      </a>                                       
                                    </div>
                                </div> 
                            </td>
                            </tr>  
                            @empty
                            <tr>    
                              <div class="flex flex-col sm:justify-center items-center">
                                  <td>
                                      <p class="text-center">No Exiten roles</p> 
                                  </td>    
                              </div>                                                    
                          </tr>
                            @endforelse           
                            <!-- More people... -->
                          </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
