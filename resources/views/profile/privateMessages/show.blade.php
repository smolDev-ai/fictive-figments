<x-layout title="{{$message->title}}">
    <x-normalPage>
       <livewire:message-reply :pm="$message" :posts="$message->posts" :participants="$participants" />
    </x-normalPage>
</x-layout>