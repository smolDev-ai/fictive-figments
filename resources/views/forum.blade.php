<x-layout title="Forums">
       	
    <div class="container mx-auto my-5">
            <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">
            @foreach($categories as $category)
            <div class="mb-10">
                <h1 class="font-bold text-black-500 text-xl">{{$category->name}}</h1>
                @foreach($category->forums as $forum)
                <h3 class="text-lg text-purple-600 hover:text-purple-900 hover:underline"><a href={{"/forum/$forum->id"}}>{{$forum->name}}</a></h3>
                    <div class="flex flex-row">
                        <p>{{$forum->description}}</p>
                        <small>{{$forum->thread_count()}}</small>

                    </div>
                </div>
                @endforeach

            @endforeach
            

</x-layout>