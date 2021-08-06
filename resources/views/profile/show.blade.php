<x-layout title="{{ $profileUser->username }}">
    <x-normalPage>
        <h1 class="2xl font-bold text-center text-black-500 mb-10">{{$profileUser->username}}</h1>
        <p class="text-black-500">Posts: {{$profileUser->postCount}}</p>
        @if($profileUser->username === auth()->user()->username)
            <a href="/me/private-message">Start a Conversation With Yourself</a>
        @else
            <a href="/profile/{{request()->slugified_user}}/private-message">Start a Converstion With {{$profileUser->username}}</a>
        @endif
        @foreach($allContent as $content)
        <div class="bg-gray-300 mb-5 py-10">
            @if($content->thread_id !== null)
                <p>{{$content->thread->trimTitle()}} posted {{$content->posted_on->diffForHumans()}}</p>
            @else
                <p>{{$content->trimTitle()}} created {{ $content->created_at->diffForHumans() }}</p>
            @endif
            
           
            <p>@bb($content->body)</p>
        </div>
        @endforeach
        {{$allContent->links()}}
    </x-normalPage>
</x-layout>