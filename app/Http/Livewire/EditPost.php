<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{

    public $editingPost;
    public $post;
    public $body;
    

    public function mount() {
        $this->body = $this->post->body;
    }

    public function cancel() {
        $this->editingPost = false;
        $this->emit('cancelPostEdit', $this->editingPost);
    }

    public function submitForm() {
        $updatedPost = Post::FindOrFail($this->post->id);

        $updatedPost->update([
            'body' => $this->body
        ]);

        \session()->flash('success', 'Post Updated Successfully!');

        $this->cancel();

    }
    
    public function render()
    {
        return view('livewire.edit-post');
    }
}
