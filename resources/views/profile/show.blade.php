<x-layout title="{{ $profileUser->username }}">
    <x-normalPage>
        
        @foreach($allContent as $content)
        <div class="bg-gray-300 mb-5 py-10">
            @if($content->thread_id !== null)
                <p>{{$content->thread->title}} posted {{$content->posted_on->diffForHumans()}}</p>
            @else
                <p>{{$content->title}} created {{ $content->created_at->diffForHumans() }}</p>
            @endif
            
           
            <p>@bb($content->body)</p>
        </div>
        @endforeach
        {{$allContent->links()}}
    </x-normalPage>
</x-layout>