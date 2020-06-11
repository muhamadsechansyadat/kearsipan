<?php

namespace App\Http\Middleware;

use Closure;

class AccessControl
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
        if (isset(auth()->user()->level)) {
            if (isset(auth()->user()->level == 0)) {
                return $next($request);       
            }
        }
        
    }
}
