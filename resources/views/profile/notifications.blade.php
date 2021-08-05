<x-layout title="Notifications">

<x-normalPage>

@foreach($all as $notification)
    <div class="bg-gray-300 mb-5 py-10">
       <a href="{{$notification->data['profileLink']}}">{{$notification->data['author']}}</a> replied to <a href="{{$notification->data["threadLink"]}}">{{ $notification->data['thread'] }}</a> {{$notification->created_at->diffForHumans()}}
       <a href="{{$notification->data['replyLink']}}"> >> </a>
    </div>
@endforeach

</x-normalPage>

</x-layout>