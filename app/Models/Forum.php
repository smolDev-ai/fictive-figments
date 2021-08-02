<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Thread;

class Forum extends Model
{
    use HasFactory;

    protected $with = [
        'threads'
    ];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function threads()
    {
        return $this->hasMany(Thread::class, "forum")->where('type', 'ooc');
    }

    public function parent()
    {
        return $this->belongsTo(Forum::class, "parent_forum");
    }

    public function thread_count()
    {
        return $this->threads->count();
    }
}
