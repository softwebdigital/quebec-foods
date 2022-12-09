<?php

namespace App\Exceptions;

use App\Traits\RespondsWithHttpStatus;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use RespondsWithHttpStatus;

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
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): JsonResponse|Response
    {
        if ($request->expectsJson()) {
            if ($e instanceof NotFoundHttpException)
                return $this->failure(message: 'Invalid route!', status: 404);

            if ($e instanceof ModelNotFoundException)
                return $this->failure(message: 'Model not found!', status: 404);

            if ($e instanceof MethodNotAllowedHttpException)
                return $this->failure(details:  $e->getMessage(), status: 405);

            if ($e instanceof ThrottleRequestsException)
                return $this->failure(message: 'Too many requests!', status: 429);

            if ($e instanceof AccessDeniedHttpException)
                return $this->failure(message: 'You don\'t own this resource!', status: 403);

            if ($e instanceof UnauthorizedException)
                return $this->failure(message: 'You don\'t own this resource!', status: 403);

            if ($e instanceof PostTooLargeException)
                return $this->failure(message: 'Payload too large!', status: 413);

            if ($e instanceof HttpException)
                return $this->failure(message: 'You don\'t own this resource!', status: 403);

            if ($e instanceof ValidationException)
                return $this->failure(message: 'Invalid payload!', details: $e->errors());
        }
        return parent::render($request, $e);
    }

    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse|RedirectResponse
    {

        if ($request->expectsJson()) {
            return $this->failure(message: 'Unauthenticated.', status: 401);
        }

        if ($request->is('admin/*')) {
            return redirect()->guest(route('admin.login'));
        }

        return redirect()->guest(route('login'));
    }
}
