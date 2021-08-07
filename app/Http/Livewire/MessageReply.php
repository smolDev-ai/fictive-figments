<?php

namespace App\Http\Livewire;

use App\Models\PMPost;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;

class MessageReply extends Component
{
    use WithPagination;

    public $pm;
    public $content;
    public $posts;
    public $participants;

    public function mount()
    {
        $this->posts = $this->pm->posts;
    }

    public function submitForm()
    {
        $post = [
                "content" => $this->content,
                "pm_id" => $this->pm->id,
                "author" => auth()->user()->id,
                "posted_on" => new DateTime(),
            ];


        $newPost = PMPost::create($post);

        $this->resetForm();
        $newPost ? $this->posts = [...$this->posts, $newPost] : "";

        $this->pm->participants->filter(function ($participant) use ($newPost) {
            return $participant->participant_id !== $newPost->author;
        })->each->newPM($newPost);
    }

    private function resetForm()
    {
        $this->content = '';
        $this->author = '';
    }


    public function render()
    {
        return view('livewire.message-reply', [
            "items" => $this->pm->posts()->oldest()->paginate(10)
        ]);
    }
}
