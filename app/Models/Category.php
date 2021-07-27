<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forum;

class Category extends Model
{
    use HasFactory;


    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
