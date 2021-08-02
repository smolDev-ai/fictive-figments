<x-layout title="{{$trimmedTitle}}">
<livewire:reply :thread="$thread" :posts="$thread->posts" :trimmedTitle="$trimmedTitle" />
</x-layout>