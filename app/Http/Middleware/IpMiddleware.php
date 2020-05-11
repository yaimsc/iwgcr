<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
{
    public $whiteIps = ['46.24.32.196', '62.99.86.10']; 

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     

    public function handle($request, Closure $next)
    {
        if(!\in_array($request->ip(), $this->whiteIps)){
            return redirect()->route('index');
        }


        return $next($request);
    }
}
