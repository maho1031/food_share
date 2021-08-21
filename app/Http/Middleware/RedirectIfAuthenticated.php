<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USER = 'user';
    private const GUARD_SHOP = 'shop';

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
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/');
        // }

        //追加
        if(Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')){
            return redirect('/');
        }

        if(Auth::guard(self::GUARD_SHOP)->check() && $request->routeIs('shop.*')){
            return redirect('/home');
        }



        return $next($request);
    }
}
