<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $role = 'admin';
        if (!$request->user()->hasRole($role)) {
            if (!$request->user()->canAny($permissions)) {
                abort(404);
            }
        }

        return $next($request);
    }
}
