<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function roleUsers()
    {
        return $this->belongsToMany(User::class, "roles_users", "role_id", "user_id");
    }
}
