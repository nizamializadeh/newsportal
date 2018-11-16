<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AcceptAuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if (auth()->user()->role == 0 && Auth::guard($guard)->check() && auth()->user()->accept == 1  ) {
            return $next($request);
        }else {
            return redirect('/');
        }
    }
}
