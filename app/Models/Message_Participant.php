<?php

namespace App\Models;

use App\Notifications\PrivateMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_Participant extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'pm' => 'string'
    ];

    public function participant()
    {
        return $this->belongsTo(User::class, "participant_id");
    }

    public function pm()
    {
        return $this->belongsTo(Private_Message::class, "pm_id");
    }

    public function newPM($pm)
    {
        $this->participant->notify(new PrivateMessage($pm));
    }
}
