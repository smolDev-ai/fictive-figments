<?php

namespace App\Models;

use App\Notifications\ThreadReply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadSubscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function notify($newPost)
    {
        return $this->user->notify(new ThreadReply($this->thread, $newPost));
    }
}
