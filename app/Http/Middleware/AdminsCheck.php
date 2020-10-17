<?php

namespace App\Http\Middleware;

use Closure;

class AdminsCheck
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
        $type = user('type');
        if ($type == 'master' || $type == 'admin') {
            return $next($request);
        }else {
            abort(403);
        }
    }
}
