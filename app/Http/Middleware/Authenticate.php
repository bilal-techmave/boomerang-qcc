<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the user is not authenticated
            if (!$request->session()->has('user')) {
                return route('login');
            }

            // Check if the CSRF token is still valid
            if ($request->session()->token() != $request->input('_token')) {
                return route('login');
            } 
            
            if (!$request->expectsJson()) {
                if ($request->is('api/*')) {
                    abort(response()->json(['status'=>false,'error' => 'Unauthenticated.'], 401));
                }
                return route('login');
            }
    }

    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
}
