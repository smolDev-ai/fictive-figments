<x-layout title="{{$thread->title}}">
<livewire:reply :thread="$thread" :posts="$thread->posts" />
</x-layout>