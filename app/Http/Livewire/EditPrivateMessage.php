<?php

namespace App\Http\Livewire;

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

    public function render()
    {
        return view('livewire.edit-private-message');
    }
}
