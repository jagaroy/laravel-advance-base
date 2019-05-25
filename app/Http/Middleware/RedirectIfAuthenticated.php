<?php

namespace App\Http\Middleware;

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
    /*public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->intendent('/home');
        }

        return $next($request);
    }*/
    
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect('admin/dashboard');
                }
                break;

            case 'user':
                if (Auth::guard($guard)->check()) {
                    return redirect('/dashboard');
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }

        return $next($request);
    }
}
