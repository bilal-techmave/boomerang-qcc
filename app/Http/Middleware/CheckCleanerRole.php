<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCleanerRole
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has the role of 'cleaner'
        if ($request->user() && $request->user()->role == 'cleaner') {
            // Check if the current route is in the allowed routes array
            $currentRoute = $request->route()->getName();
            $allowedRoutes = [
                'cleaner.dashboard',
                'cleaner.myjob',
                'cleaner.startShift',
                'cleaner.endShift',
                'cleaner.beforeImage',
                'cleaner.afterImage',
                'cleaner.startWorkShift',
                'cleaner.workBeforeImage',
                'cleaner.workAfterImage',
                'cleaner.endWorkShift',
                'storage.movement',
                'user.profile',
                'logout'
            ];
            if (in_array($currentRoute, $allowedRoutes)) {
                return $next($request);
            }else{
                abort(404);
            }
        }

        // If user doesn't have the required role or route is not allowed, return 404
        return $next($request);
    }
}