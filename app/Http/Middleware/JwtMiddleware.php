<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Helpers\FunctionHelpers;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $message = 'Token is Invalid !';
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                $message = 'Token is Expired !';
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
                $message = 'Token is not valid !';
            } else {
                $message = 'Authorization token not found !';
            }

            return response()->json(
                FunctionHelpers::resError($message, 422), 422);
        }

        return $next($request);
    }
}