<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Check for Wam-Token existence
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->header('Wam-Token')) {
            throw new MissingHeaderException('Wam-Token');
        }

        return $next($request);
    }
}
