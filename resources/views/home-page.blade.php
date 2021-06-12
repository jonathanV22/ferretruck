<x-guest-layout>
    <!--- header--->
    <div class="bg-green-700 p-6 flex justify-between items-center">
        <!--- izquierda--->
        <div class="flex items-center">
            <img src="{{asset('image/WhatsApp Image 2021-05-10 at 23.47.04.jpeg')}}" alt="" class="w-14 h-14 mr-8 ml-8 ">
            <a href="" class="inline-block text-gray-100 hover:text-white mr-4 upercase font-bold">HOME</a>
            <a href="" class="inline-block text-gray-100 hover:text-white upercase font-bold">about</a>
        </div>
        <!--- derecha--->
        <div>
            <a href="" class="inline-block py-2 px-4 text-white bg-black hover:bg-white
            hover:text-black rounded-full transition ease-in duration-150 uppercase font-bold">{{__('Login')}}</a>
            <a href="" class="inline-block py-2 px-4 text-white bg-black hover:bg-white
            hover:text-black rounded-full transition ease-in duration-150 uppercase font-bold">{{__('Register')}}</a>
        </div>
    </div>
    <!-- Page Content -->
    <div>
        @yield('content')
    </div>
    <!--- footer--->
    <div class="p-10 bg-gray-300 text-gray-800 flex justify-between">
        <!--- izquierda--->
        <div>
            <h3 class="text-lg mb-2">Join the newsletter</h3>
            <form action="#" class="flex">
              <input type="email" name="email" class="w-full rounded-l py-3 px-4 focus:ring-offset-0
                focus:ring-green-300 focus:bg-green-100">
              <button class="bg-red-300 hover:bg-red-500 rounded-r px-4">Join</button>
            </form>
        </div>
        <!--- derecha--->
        <div class="flex items-center">
            Copyright &copy; Ferretruck 2021 
        </div>
    </div>

</x-guest-layout>