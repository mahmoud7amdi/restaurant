<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="text-center">
        <h1 class=" text-center font-semibold text-xl py-6">Wellcome you are logged in !</h1>
        <a href="/" class="  font-semibold text-xl ml-6  rounded-pill main-btn">Show Menu</a>
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                
                
            </div>
        </div>
        
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-20 px-3 d-none d-lg-block">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <button class="p-6  font-semibold text-xl  leading-tight rounded-pill main-btn " href="/">Menu</button>
        </div>
    </div> --}}
</x-app-layout>
