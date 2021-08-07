<?php

namespace App\Models;

use App\Notifications\PrivateMessage;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Private_Message extends Model
{
    use HasFactory;
    use Uuids;

    protected $casts = [
        'id' => 'string'
    ];

    protected $with = [
        'author'
    ];

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(PMPost::class, "pm_id");
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
