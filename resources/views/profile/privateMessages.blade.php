<x-layout title="Private Messages">

<x-normalPage>

<a href="/me/new/private-message">Compose Private Message</a>
@foreach($PrivateMessages as $message)
    <div class="bg-gray-300 mb-5 py-10">
       <a href="/me/private-messages/{{$message->id}}">{{$message->title}}</a> by <a href="/profile/{{$message->author->slugified_user}}">{{ $message->author->username }}</a> {{$message->created_at->diffForHumans()}}
    </div>
@endforeach

</x-normalPage>

</x-layout>
