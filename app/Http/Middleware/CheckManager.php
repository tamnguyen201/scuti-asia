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
    public function handle($request, Closure $next)
    {
        $roles = [
            config('common.role.Administrator'),
            config('common.role.Interviewer'),
            config('common.role.BackOffice'),
        ];
        
        if(Auth::check() && Auth::user()->hasAnyRole($roles))
        {
            return $next($request);
        }

        return redirect('/');
    }
}
