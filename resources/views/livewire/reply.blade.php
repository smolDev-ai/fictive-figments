    <div class="container mx-auto my-5">
        <div class="bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">    
            <div class="mb-10">
                <h1 class="font-bold text-black-500 text-xl">{{$thread->title}}</h1>
                <hr />
                <p>{{$thread->creator->username}}</p>
                <p class="mt-5 mb-10">{{$thread->body}}</p>
                    <hr />
                @foreach($posts as $post)
                    <div class="flex flex-row">
                        <p class="mb-10">{{$post->body}}</p>
                        <p>{{$post->creator->username}}</p>
                    </div>
                @endforeach
            </div>
            @auth
                <form wire:submit.prevent="submitForm" method="POST" action="/forum/{{$thread->forum}}/thread/{{$thread->id}}/reply">
                    @csrf
                    <textarea wire:model.defer="body" class="w-full mb-3 px-5" name="body" id="body" rows="10" placeholder="Want to Reply?"></textarea>
                    <input wire:model="thread" type="hidden" name="thread" value={{$thread->id}}>
                    <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                </form>
            @endauth
            @guest
                <p>You must be <a class="text-purple-600 hover:text-purple-900 hover:underline" href="/login">Logged in</a> to post.</p>
            @endguest       
    </div>