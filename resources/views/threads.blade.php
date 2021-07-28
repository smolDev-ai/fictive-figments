<x-layout title="{{$forums->name}}">
    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">    
            <div class="mb-10">
                <h1 class="font-bold text-black-500 text-xl">{{$forums->name}}</h1>
                    <hr />
                @foreach($forums->threads as $thread)
                    <div class="flex flex-row">
                        <h4 class="text-lg text-purple-600 hover:text-purple-900 hover:underline"><a href={{"/forum/threads/$thread->id"}}>{{$thread->title}}</a></h4>
                        <p>{{$thread->post_count()}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>