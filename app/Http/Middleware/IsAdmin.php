<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is admin
        if (Auth::user() && Auth::user()->roles == 'ADMIN') {
            return $next($request);
        }

        // if the user is not admin
        return redirect('/');
    }
}
