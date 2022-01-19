<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelpers;

class OnlyJsonRequest
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
        if ($request->isJson()) {
            return $next($request);
        } else {
            return response()->json(
                FunctionHelpers::resError('Request must be JSON', 422), 422);
        }
    }
}
