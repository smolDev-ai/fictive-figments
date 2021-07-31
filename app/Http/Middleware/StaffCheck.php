<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = auth()->user()->userRoles;

        if ($roles->contains(Role::find(1)) || $roles->contains(Role::find(2))) {
            return $next($request);
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }
}
