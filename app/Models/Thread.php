<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forum;
use App\Models\User;
use App\Models\Post;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'created_on'
    ];


    protected $with = ['creator'];
    protected $appends = ['isSubscribed'];

    public function forum()
    {
        return $this->belongsTo(Forum::class, "forum");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "author");
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post_count()
    {
        return $this->posts->count();
    }

    public function trimTitle()
    {
        $threadTitle = substr($this->title, 0, strlen($this->type . "_")) === $this->type . "_" ? substr($this->title, strlen($this->type . "_")) : $this->title;
        return $threadTitle;
    }

    public function getICPostCount()
    {
        return Thread::where('type', 'ic')->where('title', 'ic_' . $this->trimTitle())->first()->post_count();
    }

    public function getOOCPostCount()
    {
        return Thread::where('type', 'ooc')->where('title', 'ooc_' . $this->trimTitle())->first()->post_count();
    }

    public function getCharPostCount()
    {
        return Thread::where('type', 'char')->where('title', 'char_' . $this->trimTitle())->first()->post_count();
    }

    public function subscriptions()
    {
        return $this->hasMany(ThreadSubscription::class, 'thread_id');
    }

    public function subscribe()
    {
        return $this->subscriptions()->create([
            "user_id" => auth()->user()->id,
            "thread_id" => $this->id,
        ]);
    }

    public function unsubscribe()
    {
        return $this->subscriptions()->where('user_id', auth()->user()->id)->delete();
    }

    public function getisSubscribedAttribute()
    {
        return auth()->user() ? $this->subscriptions()->where("user_id", auth()->user()->id)->exists() : false;
    }
}
