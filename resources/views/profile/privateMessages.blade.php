<x-layout title="Private Messages">

<x-normalPage>

@foreach($PrivateMessages as $message)
    <div class="bg-gray-300 mb-5 py-10">
       <a href="#">{{$message->title}}</a> by <a href="#">{{ $message->author->username }}</a> {{$message->created_at->diffForHumans()}}
    </div>
@endforeach

</x-normalPage>

</x-layout>