<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DebugModeMiddleware
{
    public function handle($request, Closure $next)
    {
        // $allowedIPs = ['180.151.27.198', ' 103.226.202.112','125.63.100.84','119.82.94.218','119.82.86.13']; // Add your allowed IP addresses
        // $clientIP = $request->ip();
        // //$allowedIPs =[];

        // if (in_array($clientIP, $allowedIPs)) {
        //     Config::set('app.debug', true);
        // } else {
        //     Config::set('app.debug', false);
        // }

        return $next($request);
    }
}
