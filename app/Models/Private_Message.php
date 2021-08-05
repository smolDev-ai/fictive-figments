<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Private_Message extends Model
{
    use HasFactory;

    protected $with = [
        "author"
    ];

    public function posts()
    {
        return $this->hasMany(PMPost::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "creator");
    }

    public function participants()
    {
        return $this->hasMany(Message_Participant::class, 'pm_id');
    }
}
