<?php

namespace PaHooSBooKinG\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // the following 3 lines
            if (Auth::user()->role) { 
                return redirect('/admin/home');
            }    
            return redirect('/home');
        }    
        return $next($request);
    }
}
