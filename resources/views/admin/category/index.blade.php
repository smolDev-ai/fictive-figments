<x-layout title="Admin Panel">

    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">
            @foreach($categories as $category)
                <div class="mb-10">
                    <h1 class="font-bold text-black-500 text-xl">{{$category->name}}</h1>
                    @if($category->is_rp)
                        <p>RP Category</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


</x-layout>
