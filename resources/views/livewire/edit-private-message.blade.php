<div>
    <form wire:submit.prevent="submitForm">
        @csrf
        <x-input.tinymce wire:model="content" class="w-full" rows="10"></x-input.tinymce>
        <button class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
        <button wire:click="cancel" type="button">Cancel</button>
    </form>
</div>