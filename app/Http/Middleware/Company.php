<?php

namespace DevRocks\Http\Middleware;

use Closure;

class Company
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
        if (auth()->user()->is_company == 1) {
            return $next($request);
        }
        return redirect('home')->with('error', 'You are not a company, permission not allowed!');
    }
}
