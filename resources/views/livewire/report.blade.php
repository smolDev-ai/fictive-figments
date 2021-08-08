<div>
    <button class="text-purple-600 hover:text-purple-900 hover:underline" type="button" wire:click="$set('show', true)">Report</button>

    <x-report-modal wire:model="show">
        <x-slot name="title">
            Would You LIke To Report This Content?
        </x-slot>

        <x-slot name="body">
            <form wire:submit.prevent="submitReport">
                @csrf
                <x-input.tinymce wire:model="comments" class="w-full" rows="10" placeholder="Report Comments"></x-input.tinymce>
            </form>
        </x-slot>
        
        <x-slot name="footer">
            <button type="button" wire:click="$set('show', false)">Cancel</button>
            <button type="submit" wire:click="submitReport" class="w-32 bg-indigo-600 text-white p-3 rounded-md">Submit</button>
        </x-slot>
    </x-report-modal>
</div>
