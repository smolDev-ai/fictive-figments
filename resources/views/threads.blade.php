<x-layout title="{{$forums->name}}">
    <x-normalPage>
            <div class="mb-10">
                <a class="text-lg text-purple-600 hover:text-purple-900 hover:underline" href={{"/forum/$forums->id/thread/create"}}>New Thread</a>
                <h1 class="font-bold text-black-500 text-xl">{{$forums->name}}</h1>
                <hr />
                @foreach($forums->threads as $thread)
                    <div class="flex flex-row">
                        @if($forums->category->is_rp)
                        <h4 class="text-lg text-purple-600 hover:text-purple-900 hover:underline"><a href={{"/forum/$forums->id/thread/$thread->slug/$thread->type"}}>{{$thread->trimTitle()}}</a></h4>
                        <p>{{$thread->post_count()}}</p>
                        @else
                        <h4 class="text-lg text-purple-600 hover:text-purple-900 hover:underline"><a href={{"/forum/$forums->id/thread/$thread->slug/"}}>{{$thread->title}}</a></h4>
                        <p>{{$thread->post_count()}}</p>
                        @endif
                    </div>
                @endforeach
            </div>
    </x-normalPage>
</x-layout>