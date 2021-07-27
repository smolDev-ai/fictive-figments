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


    protected $with = ['author', 'posts'];

    public function forum()
    {
        return $this->belongsTo(Forum::class, "forum");
    }

    public function author()
    {
        return $this->belongsTo(User::class, "author");
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
