<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCSRF
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (!empty($_COOKIE['XSRF-TOKEN'])) {
            return $next($request);
        } else {
            abort(403);
        }
        
    }
}
