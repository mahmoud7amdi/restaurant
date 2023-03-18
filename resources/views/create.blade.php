<x-layout>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl  bold">
                Create breakfast
            </h1>
        </div>
    </div>
    
    <div class="flex justify-center pt-20">
        <form action="/" method="POST">
            @csrf
            <div class="block">
                <input 
                type="text"
                class="block  shadow-5xl bg-green-200 mb-10 p-2 w-80 italic placeholder-blue-400"
                name="name"
                placeholder="Breakfast name ..."
                >
                <input 
                type="text"
                class="block shadow-5xl bg-green-200 mb-10 p-2 w-80 italic placeholder-blue-400"
                name="description"
                placeholder="description ..." >
                
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 font-bold">Submit</button>
            </div>
        </form>
    </div>
        
</x-layout>    