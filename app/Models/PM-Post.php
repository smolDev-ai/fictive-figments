<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Private_Message;
use App\Models\User;

class PMPost extends Model
{
    use HasFactory;

    public function pm()
    {
        $this->belongsTo(Private_Message::class, "pm_id");
    }

    public function author()
    {
        $this->belongsTo(User::class, "author");
    }
}
