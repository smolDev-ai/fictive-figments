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
    @if($editingPM === false)
        @auth
            <livewire:report :content="$pm->body" :reportedUser="$pm->creator"/>
        @endauth
        @can('update', $pm)
            <button wire:click="$emit('editPM', '{{$pm->id}}')"
                    class="text-purple-600 hover:text-purple-900 hover:underline">Edit
            </button>
        @endcan
        <p>{{$pm->body}}</p>
    @else
        <livewire:edit-private-message :editingPM="$editingPM" :pm="$pm"/>
    @endif
    @foreach($posts as $index => $post)
        <div class="flex flex-row">
            @if(!$editingPost || $postId != $index)
                <p class="mb-10" id={{$post->id}}>@bb($post->content)</p>
                <p>{{$post->creator->username}}</p>
                @auth
                    <livewire:report :content="$post->content" :reportedUser="$post->author" :wire:key="$post->id"/>
                @endauth
                @can('update', $post)
                    <button wire:click="$emit('editPost', '{{$index}}')"
                            class="text-purple-600 hover:text-purple-900 hover:underline" :wire:key="{{$index}}">Edit
                    </button>
                @endcan
            @endif
            @if($editingPost && $postId == $index)
                @can('update', $post)
                    <livewire:edit-private-message :editingPost="$editingPost" :post="$post" />
                @endcan
            @endif
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
