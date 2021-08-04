<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadSubscriptionController extends Controller
{
    public function store()
    {
        $forum = Forum::find(request()->forum_id);
        if ($forum->category->is_rp) {
            foreach ($forum->threads as $thread) {
                if ($thread->slug === request()->thread_slug) {
                    $roleplayThreads = Thread::where("slug", $thread->slug)->get();
                    foreach ($roleplayThreads as $rp) {
                        $rp->subscribe();
                    }
                }
            }
        } else {
            foreach ($forum->threads as $thread) {
                if ($thread->slug === request()->thread_slug) {
                    $thread->subscribe();
                }
            }
        }
    }

    public function destroy()
    {
        $forum = Forum::find(request()->forum_id);
        if ($forum->category->is_rp) {
            foreach ($forum->threads as $thread) {
                if ($thread->slug === request()->thread_slug) {
                    $roleplayThreads = Thread::where("slug", $thread->slug)->get();
                    foreach ($roleplayThreads as $rp) {
                        $rp->unsubscribe();
                    }
                }
            }
        } else {
            foreach ($forum->threads as $thread) {
                if ($thread->slug === request()->thread_slug) {
                    $thread->unsubscribe();
                }
            }
        }
    }
}
