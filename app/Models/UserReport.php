<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reported()
    {
        return $this->belongsTo(User::class, "reported_user");
    }

    public function reporting()
    {
        return $this->belongsTo(User::class, 'reporting_user');
    }
}
