<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    //public function handle(Request $request, Closure $next, ...$guards)
    public function handle(Request $request, Closure $next, $guard = null)
    {
        /*
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
        */

        // azrin - set for multiple user login
        if (Auth::guard($guard)->check() && Auth::user()->role_id == 1) {
            return redirect()->route('admins.dashboard');
        } elseif(Auth::guard($guard)->check() && Auth::user()->role_id == 2){
            return redirect()->route('managers.dashboard');
        } elseif(Auth::guard($guard)->check() && Auth::user()->role_id == 3){
            return redirect()->route('users.dashboard');
        } elseif(Auth::guard($guard)->check() && Auth::user()->role_id == 4){
            return redirect()->route('linemanagers.dashboard');
        } else {
            return $next($request);
        }
    }
}
