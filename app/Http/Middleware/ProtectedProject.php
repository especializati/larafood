<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProtectedProject
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
        if (app()->runningInConsole()) {
            return $next($request);
        }

        return redirect()->away('https://www.especializati.com/curso-laravel-larafood');
    }
}
