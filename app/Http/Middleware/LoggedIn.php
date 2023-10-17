<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class LoggedIn
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!is_null(request()->user())) {
            return redirect(RouteServiceProvider::HOME);
        } else {
            return $next($request);
        }
    }
}
