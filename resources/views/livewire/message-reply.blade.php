<div>
 <h1>{{$pm->title}}</h1>
        <p>{{$pm->author->username}}</p>
        @foreach($participants as $participant)
            <ul>
                @if($participant->participant->id !== $pm->author->id)
                <li>
                    {{$participant->participant->username}}
                </li>
                @endif
            </ul>
        @endforeach
        <p>{{$pm->body}}</p>
        @foreach($items as $post)
            <div class="flex flex-row">
                <p class="mb-10" id={{$post->id}}>@bb($post->content)</p>
                <p>{{$post->creator->username}}</p>
            </div>
        @endforeach
        @if(count($items) <= 1)
            
        @else
            {{$items->links()}}
        @endif
        <form wire:submit.prevent="submitForm" method="POST" action="/me/private-messages/{{$pm->id}}/reply">
            @csrf
            <x-input.tinymce wire:model="content" class="w-full" rows="10" placeholder="Want to Reply?"></x-input.tinymce>
            <input wire:model="thread" type="hidden" name="thread" value={{$pm->id}}>
            <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
        </form>
</div>
