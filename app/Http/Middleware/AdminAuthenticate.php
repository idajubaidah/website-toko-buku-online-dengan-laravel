<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class AdminAuthenticate
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
        if(!auth('customer')) {
            return redirect()->route('admin.login');
        } return $next($request);

    } 
}
