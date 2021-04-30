<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\isAdmin as Middleware;
use Closure;
use Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
             return $next($request);
        }

        return redirect('/');//non-admin user would be redirected towards /
    }
}
