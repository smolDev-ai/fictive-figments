<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Notifications\ThreadReply;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;

class Reply extends Component
{
    use WithPagination;
    public $thread;
    public $body;
    public $posts;
    public $editingThread = false;
    public $editingPost = false;
    public $editingPostId;

    protected $listeners = ['editPost'];

    public function mount()
    {
        $this->posts = $this->thread->posts;
    }

    public function submitForm()
    {
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

        $this->thread->subscriptions->filter(function ($sub) use ($newPost) {
            return $sub->user_id !== $newPost->author;
        })->each->notify($newPost);
    }

    private function resetForm()
    {
        $this->body = '';
    }

    public function editPost($index)
    {
        $this->editingPost = true;
        $this->editingPostId = $index;
    }

    public function render()
    {
        return view('livewire.reply', [
            "content" => $this->thread->posts()->oldest()->paginate(15)
        ]);
    }
}
