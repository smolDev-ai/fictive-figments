    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">    
            <div class="mb-10">
              @if($thread->type)
                    @include('partials._threadTabs')
                @endif
                @if($editingThread === false) 
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
                        @can('update', $thread)
                            <button wire:click="$set('editingThread', true)" class="text-purple-600 hover:text-purple-900 hover:underline">
                                Edit
                            </button> 
                        @endcan
                    <livewire:subscription :thread="$thread" :subscribed="$thread->isSubscribed" />
                   
                @endauth
                <hr />
                <p>{{$thread->creator->username}}</p>
                <p class="mt-5 mb-10">@bb($thread->body)</p>
                @else
                    <form>
                        @csrf
                        <div class="mb-5 relative">
                        <input type="title" name="title" id="title" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" placeholder="shadowrunner245" autocomplete="off" />
                        <label for="title" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Title</label>
                            
                    </div>
                    <div class="mb-5 relative">
                        <textarea class="w-full" name="body" id="body" rows="10" placeholder="Your world here..."></textarea>
                    </div>
                    <button class="w-50 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                    <button wire:click="$set('editingThread', false)" class="w-50 bg-white-600 text-black p-3 rounded-md">Cancel</button>
                        @if ($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-red-500 text-md">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                    @endif
                    <hr />
                @foreach($content as $index => $post)
                    <div class="flex flex-row">
                        @if($editingPost === false && $editingPostId !== $index)
                        <p class="mb-10" id={{$post->id}}>@bb($post->body)</p>
                        <p>{{$post->creator->username}}</p>
                        @endif
                        @if($editingPost )
                        <form>
                            @csrf
                             <x-input.tinymce wire:model="body" class="w-full" rows="5" placeholder="Want to Reply?"></x-input.tinymce>
                             <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                             <button wire:click="$set('editPost', 'false')" class="w-50 bg-white-600 text-black p-3 rounded-md">Cancel</button>
                        </form>
                        @endif
                        @auth
                        @can('update', $post)
                            <button wire:click="$emit('editPost', '{{$index}}')" class="text-purple-600 hover:text-purple-900 hover:underline">
                                Edit
                            </button>
                        @endcan
                        @can('delete', $post)
                            Delete
                        @endcan
                        <livewire:report :content="$post->body" :reportedUser="$post->author"/>
                        @endauth
                        
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
                <form wire:submit.prevent="submitForm" method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/reply">
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