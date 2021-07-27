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

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function threads()
    {
        return $this->hasMany(Thread::class, "forum");
    }

    public function parent()
    {
        return $this->belongsTo(Forum::class, "parent_forum");
    }
}
