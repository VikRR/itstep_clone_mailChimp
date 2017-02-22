<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class SetLocale
 * @package App\Http\Middleware
 */
class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->setLocale(\Session::get('locale'));

        return $next($request);
    }
}
