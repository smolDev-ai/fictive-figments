<?php

namespace App\Http\Livewire;

use App\Models\Forum;
use App\Models\Thread;
use Livewire\Component;

class Subscription extends Component
{
    public $thread;
    public $subscribed;

    public function subscribe()
    {
        if (!$this->subscribed) {
            $forum = Forum::find($this->thread->forum);
            if ($forum->category->is_rp) {
                foreach ($forum->threads as $thread) {
                    if ($thread->slug === $this->thread->slug) {
                        $roleplayThreads = Thread::where("slug", $thread->slug)->get();
                        foreach ($roleplayThreads as $rp) {
                            $rp->subscribe();
                        }
                    }
                }
            } else {
                foreach ($forum->threads as $thread) {
                    if ($thread->slug === $this->thread->slug) {
                        $thread->subscribe();
                    }
                }
            }
            session()->flash('subscribed!');
        } else {
            $forum = Forum::find($this->thread->forum);
            if ($forum->category->is_rp) {
                foreach ($forum->threads as $thread) {
                    if ($thread->slug === $this->thread->slug) {
                        $roleplayThreads = Thread::where("slug", $thread->slug)->get();
                        foreach ($roleplayThreads as $rp) {
                            $rp->unsubscribe();
                        }
                    }
                }
            } else {
                foreach ($forum->threads as $thread) {
                    if ($thread->slug === $this->thread->slug) {
                        $thread->unsubscribe();
                    }
                }
            }
        }

        $this->subscribed = !$this->subscribed;
    }


    public function render()
    {
        return view('livewire.subscription');
    }
}
