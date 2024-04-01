<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->code == "!77168558") {
            return $next($request);
        } else {
            return redirect('no-autorizado');
        }
    }
}
