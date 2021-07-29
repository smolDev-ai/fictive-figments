<?php

namespace App\Http\Livewire;

use App\Models\Post;
use DateTime;
use Livewire\Component;

class Reply extends Component
{
    public $thread;
    public $body;
    public $update;

    public function submitForm()
    {
        $currentThread = (int) substr(url()->previous(), -strlen($this->thread->id));

        if (!$currentThread == substr(url()->previous(), -strlen($this->thread->id))) {
            return session()->flash("Failure", "You can't post to this thread.");
        } else {
            $post = [
                "body" => $this->body,
                "thread_id" => $this->thread->id,
                "author" => auth()->user()->id,
                "posted_on" => new DateTime(),
            ];
        }


        Post::create($post);

        $this->resetForm();

        return redirect("/forum/threads/{$this->thread->id}");
    }

    private function resetForm()
    {
        $this->body = '';
        $this->author = '';
    }

    public function refresh()
    {
        $this->update = !$this->update;
    }


    public function render()
    {
        return view('livewire.reply');
    }
}
