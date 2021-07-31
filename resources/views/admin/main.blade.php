<x-layout title="Admin Panel">

    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">
            {{request()->user()->username}} is staff!
            
        </div>
    </div>
    

</x-layout>