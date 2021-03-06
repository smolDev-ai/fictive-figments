<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Thread;
use App\Models\Post;
use App\Models\PMPost;
use App\Models\Private_Message;
use App\Notifications\NewReport;
use App\Notifications\PrivateMessage;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        "userRoles"
    ];

    public function threads()
    {
        return $this->hasMany(Thread::class, "author")->latest()->where('type', 'ooc');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, "author")->latest();
    }

    public function pms()
    {
        return $this->hasMany(Private_Message::class);
    }

    public function pmposts()
    {
        return $this->hasMany(PMPost::class);
    }

    public function userRoles()
    {
        return $this->belongsToMany(Role::class, "roles_users", "user_id", "role_id");
    }

    public function incrementPostCount()
    {
        return $this->increment('postCount');
    }

    public function decrementPostCount()
    {
        return $this->decrement('postCount');
    }

    public function isStaff()
    {
        foreach ($this->userRoles as $role) {
            if ($role->name === 'admin' || $role->name === 'mod') {
                return true;
            } else {
                return false;
            }
        }
    }

    public function newReport($report)
    {
        $this->notify(new NewReport($report));
    }
}
