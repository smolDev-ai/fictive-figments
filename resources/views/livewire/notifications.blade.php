<div>

    <div x-data="{ dropdownOpen: false }" class="relative">
        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
            @if($notifications->count() > 0)
            <span class="absolute inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
            @endif
            <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
            </svg>

        </button>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
            <div class="py-2">
                @if($notifications->count() === 0)
                    <p>
                        No Notifications
                    </p>
                    @endif
                    @foreach($notifications as $notification)
                        @if($notification->data['type'] === "new_post")
                            <a wire:click.prevent="$emit('markNotificationAsRead', '{{$notification->id}}')" href="{{$notification->data['replyLink']}}" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                                <p class="text-gray-600 text-sm mx-2">
                                    <span class="font-bold" href="{{$notification->data['profileLink']}}">{{$notification->data['author']}}</span> replied to <span class="font-bold text-blue-500" href="{{$notification->data['threadLink']}}">{{$notification->data['thread']}}</span> {{$notification->created_at->diffForHumans()}}
                                </p>
                            </a>

                        @elseif($notification->data['type'] === "new_report")
                            <a wire:click.prevent="$emit('markNotificationAsRead', '{{$notification->id}}')" href="{{$notification->data['reportLink']}}" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                <p class="text-gray-600 text-sm mx-2">
                                    {{$notification->data['message']}} {{$notification->created_at->diffForHumans()}}
                                </p>
                            </a>
                            @else
                            <a wire:click.prevent="$emit('markNotificationAsRead', '{{$notification->id}}')" href="{{$notification->data['messageLink']}}" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                                <p class="text-gray-600 text-sm mx-2">
                                    <span class="font-bold" href="{{$notification->data['profileLink']}}">{{$notification->data['author']}}</span> {{$notification->data['message']}} <span class="font-bold text-blue-500" href="{{$notification->data['messageLink']}}">{{$notification->data['title']}}</span> {{$notification->created_at->diffForHumans()}}
                                </p>
                            </a>
                            @endif


                @endforeach
    </div>
    <a href="/me/notifications" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a>
        </div>
    </div>
</div>
</div>
