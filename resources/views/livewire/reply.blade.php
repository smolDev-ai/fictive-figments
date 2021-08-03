    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">    
            <div class="mb-10">
              @if($thread->type)
                    @include('partials._threadTabs')
                @endif 
                <h1 class="font-bold text-black-500 text-xl">{{$thread->trimTitle()}}</h1>
                @auth
                    @can('delete', $thread)
                        @if($thread->type)
                            <form method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/{{$thread->type}}/delete">
                                @csrf
                                @method('DELETE')
                                <button class="text-purple-600 hover:text-purple-900 hover:underline">Delete</button>
                            </form>
                        @else
                            <form method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->id}}/delete">
                                @csrf
                                @method('DELETE')
                                <button class="text-purple-600 hover:text-purple-900 hover:underline">Delete</button>
                            </form>
                        @endif
                    @endcan
                @endauth
                <hr />
                <p>{{$thread->creator->username}}</p>
                <p class="mt-5 mb-10">@bb($thread->body)</p>
                    <hr />
                @foreach($content as $post)
                    <div class="flex flex-row">
                        <p class="mb-10">@bb($post->body)</p>
                        <p>{{$post->creator->username}}</p>
                    </div>
                @endforeach
            </div>
            @if(count($content) <= 1)
            
            @else
            {{$content->links()}}
            @endif
            @auth
            @if($thread->type)
                <form wire:submit.prevent="submitForm" method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/{{$thread->type}}/reply">
                    @csrf
                    <x-input.tinymce wire:model="body" class="w-full" rows="10" placeholder="Want to Reply?"></x-input.tinymce>
                    <input wire:model="thread" type="hidden" name="thread" value={{$thread->id}}>
                    <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                </form>
            @else
                <form method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/reply">
                     @csrf
                    <x-input.tinymce wire:model="body" class="w-full" rows="10" placeholder="Want to Reply?"></x-input.tinymce>
                    <input wire:model="thread" type="hidden" name="thread" value={{$thread->id}}>
                    <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                </form>
            @endif
            @endauth
            @guest
                <p>You must be <a class="text-purple-600 hover:text-purple-900 hover:underline" href="/login">Logged in</a> to post.</p>
            @endguest  
            
            
</div>

    </div>