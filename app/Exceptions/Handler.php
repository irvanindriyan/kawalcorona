<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Helpers\FunctionHelpers;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        
        $this->renderable(function (Throwable $e) {
            if (config('app.debug') && !($e instanceof ValidationException) && !($e instanceof HttpResponseException) && empty($e->getMessage())) {
                return response()->json(
                    FunctionHelpers::resError('Page Not Found', 404), 
                    $e->getCode() ?: 404);
            }

            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 
                $e->getCode() ?: 500);
        });
    }
}
