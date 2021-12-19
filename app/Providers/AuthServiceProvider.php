<?php

namespace App\Providers;

use App\Models\PMPost;
use App\Models\Post;
use App\Models\Private_Message;
use App\Models\Thread;
use App\Policies\PMPostPolicy;
use App\Policies\PostPolicy;
use App\Policies\PrivateMessagePolicy;
use App\Policies\ThreadPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Thread::class => ThreadPolicy::class,
        Post::class => PostPolicy::class,
        PMPost::class => PMPostPolicy::class,
        Private_Message::class => PrivateMessagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
