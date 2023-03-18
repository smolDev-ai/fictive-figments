<?php

namespace App\Http\Livewire;

use App\Models\PMPost;
use App\Models\Private_Message;
use Livewire\Component;

class EditPrivateMessage extends Component
{
    public $editingPM;
    public $editingPost;
    public $pm;
    public $post;
    public $content;



    public function mount() {
        if($this->pm) {
            $this->content = $this->pm->body;
        } else {
            $this->content = $this->post->content;
        }
    }

    public function cancel() {
        if($this->editingPM) {
            $this->editingPM = false;
            $this->emit('cancelPMEdit', $this->editingPM);
        } else {
            $this->editingPost = false;
            $this->emit('cancelPostEdit', $this->editingPost);
        }
    }

    public function submitForm() {
        if($this->pm) {
            $updatedPM = Private_Message::FindOrFail($this->pm->id);
            $updatedPM->update([
                'body' => $this->content
            ]);
        } else {
            $updatedPM = PMPost::FindOrFail($this->post->id);
            $updatedPM->update([
                'content' => $this->content
            ]);
        }



        \session()->flash('success', 'Message Updated Successfully!');

        $this->cancel();
    }

    public function render()
    {
        return view('livewire.edit-private-message');
    }
}
