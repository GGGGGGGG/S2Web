<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;


class Banned
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
        $redirection = $next($request);

        if(auth()->check() && auth()->user()->isBanned())
        {
            $redirection = redirect('/banned');
            auth()->logout();
        }

        return $redirection;
    }
}
