<?php

namespace App\Http\Livewire;

use App\Models\Post;
use DateTime;
use Livewire\Component;

class Reply extends Component
{
    public $thread;
    public $posts;
    public $body;
    public $update;
    public $trimmedTitle;

    public function submitForm()
    {
        $this->posts = $this->thread->posts;

        $post = [
                "body" => $this->body,
                "thread_id" => $this->thread->id,
                "author" => auth()->user()->id,
                "posted_on" => new DateTime(),
            ];


        $newPost = Post::create($post);

        request()->user()->incrementPostCount();

        $this->resetForm();
        $newPost ? $this->posts = [...$this->posts, $newPost] : "";
    }

    private function resetForm()
    {
        $this->body = '';
        $this->author = '';
    }

    public function render()
    {
        return view('livewire.reply');
    }
}
