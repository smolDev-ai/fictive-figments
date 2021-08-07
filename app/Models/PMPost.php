<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'pm_id' => 'string'
    ];

    protected $with = [
        "creator"
    ];

    public function pm()
    {
        return $this->belongsTo(Private_Message::class, "pm_id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "author");
    }
}
