<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if(Auth::guard($guard)->check() && Auth::guard($guard)->user()->role != config('common.role.User'))
        {
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
