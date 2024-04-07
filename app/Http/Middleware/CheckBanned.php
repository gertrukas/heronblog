<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->active == false)) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            // throw new \Exception('Su cuenta está suspendida, comuníquese con el administrador.');

            return redirect('login')->with('error', 'Su cuenta está suspendida, comuníquese con el administrador.');
        }

        return $next($request);
    }
}