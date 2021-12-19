<div>
    <form wire:submit.prevent="submitForm">
        @csrf
         <div class="mb-5 relative">
            <input wire:model="title" name="title" id="title" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" autocomplete="off" />
            <label for="title" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Title</label>
        </div>
        <x-input.tinymce wire:model="body" class="w-full" rows="10"></x-input.tinymce>
        <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
        <button wire:click="cancel" type="button">Cancel</button>
    </form>
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500 text-md">{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>
