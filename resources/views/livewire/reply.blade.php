    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">    
            <div class="mb-10">
              @if($thread->type)
                    @include('partials._threadTabs')
                @endif 
                <h1 class="font-bold text-black-500 text-xl">{{$thread->trimTitle()}}</h1>
                @auth
                 @if(session()->has('success'))
                    <div class="bg-green-500">{{session('success')}}</div>
                @endif
                    @can('delete', $thread)
                        @if($thread->type)
                            <form method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/{{$thread->type}}/delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-purple-600 hover:text-purple-900 hover:underline">Delete</button>
                            </form>
                        @else
                            <form method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->id}}/delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-purple-600 hover:text-purple-900 hover:underline">Delete</button>
                            </form>
                        @endif
                    @endcan
                    <livewire:subscription :thread="$thread" :subscribed="$thread->isSubscribed" />
                   
                @endauth
                <hr />
                <p>{{$thread->creator->username}}</p>
                <p class="mt-5 mb-10">@bb($thread->body)</p>
                    <hr />
                @foreach($content as $post)
                    <div class="flex flex-row">
                        <p class="mb-10" id={{$post->id}}>@bb($post->body)</p>
                        <p>{{$post->creator->username}}</p>
                         @auth
                        <livewire:report :content="$post->body" :reportedUser="$post->author" :wire:key="$post->id" />
                        @endauth
                    </div>
                @endforeach
            </div>
            @if(count($content) <= 1)
            
            @else
            {{$content->links()}}
            @endif
            @auth
                <form wire:submit.prevent="submitForm">
                    @csrf
                    <x-input.tinymce wire:model="body" class="w-full" rows="10" placeholder="Want to Reply?"></x-input.tinymce>
                    <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                </form>
            @endauth
            @guest
                <p>You must be <a class="text-purple-600 hover:text-purple-900 hover:underline" href="/login">Logged in</a> to post.</p>
            @endguest  
            
            
</div>

    </div>