<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
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
        if($request->ip() != '46.24.32.196' || $request->ip() != '62.99.86.10' ){
            return redirect()->route('index');
        }


        return $next($request);
    }
}
