<?php

namespace App\Exceptions;

use ErrorException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        $user = auth()->user();

        if (isset($user)) {
            $viewPath = $user->hasRole('root') ? 'admin.pages.errors' : 'client.pages.errors';
        } else {
            $viewPath = 'client.pages.errors';
        }

        $error = [
            'error' => $exception->getTraceAsString(),
        ];

        switch (true) {
            case $exception instanceof BadRequestHttpException : {
                return response()->view("$viewPath.400", $error, $exception->getStatusCode());
            } break;
            case $exception instanceof UnauthorizedHttpException : {
                return response()->view("$viewPath.401", $error, $exception->getStatusCode());
            } break;
            case $exception instanceof HttpException && $exception->getStatusCode() === 403 : {
                return response()->view("$viewPath.403", $error, $exception->getStatusCode());
            } break;
            case $exception instanceof NotFoundHttpException :
            case $exception instanceof MethodNotAllowedHttpException : {
                return response()->view("$viewPath.404", $error, $exception->getStatusCode());
            } break;
            case $exception instanceof ErrorException : {
                return response()->view("$viewPath.500", $error, $exception->getStatusCode());
            } break;
            case $exception instanceof ServiceUnavailableHttpException : {
                return response()->view("$viewPath.503", $error, $exception->getStatusCode());
            } break;
        }

        return parent::render($request, $exception);
    }
}
