<?php

namespace App\Http\Middleware;

use Closure;

class ActiveCookOrMaster
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
        if (master() || active_cook()) {
            return $next($request);
        }else {
            abort(403);
        }
    }
}
