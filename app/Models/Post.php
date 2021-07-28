<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Thread;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $with = ['creator'];
    protected $guarded = [];

    public function thread()
    {
        return $this->belongsTo(Thread::class, "thread_id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "author");
    }

    public function author_name()
    {
        return $this->author()->username;
    }
}
