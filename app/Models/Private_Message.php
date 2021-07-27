<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PMPost;
use App\Models\User;

class Private_Message extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(PMPost::class);
    }

    public function creator()
    {
        return $this->bleongsTo(User::class, "creator");
    }
}
