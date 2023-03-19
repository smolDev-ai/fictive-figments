<x-layout title="Admin Panel">

    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">
            @foreach($forums as $forum)
                <div class="mb-10">
                    <h1 class="font-bold text-black-500 text-xl">{{$forum->name}}</h1>
                    <p>{{$forum->description}}</p> @if($forum->is_subForum)<p>is a Subforum of: {{$forum->parent->name}}</p>@endif
                </div>
            @endforeach
        </div>
    </div>


</x-layout>
