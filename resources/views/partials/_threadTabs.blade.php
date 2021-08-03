                <div>
                    <ul class="flex flex-row space-x-10">
                            <li><a class="text-purple-600 hover:text-purple-900 hover:underline" href="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/ic">{{strtoupper('ic')}}</a> {{$thread->getICPostCount()}}</li>
                            <li><a class="text-purple-600 hover:text-purple-900 hover:underline" href="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/ooc">{{strtoupper('ooc')}}</a> {{$thread->getOOCPostCount()}}</li>
                            <li><a class="text-purple-600 hover:text-purple-900 hover:underline" href="/forum/{{$thread->forum}}/thread/{{$thread->slug}}/char">{{strtoupper('char')}}</a> {{$thread->getCharPostCount()}}</li>
                    </ul>
                </div>