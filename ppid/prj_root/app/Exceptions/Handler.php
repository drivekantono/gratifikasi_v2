<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Auth;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
     // protected $dontReport = [
     //     \Illuminate\Auth\AuthenticationException::class,
     //     \Illuminate\Auth\Access\AuthorizationException::class,
     //     \Symfony\Component\HttpKernel\Exception\HttpException::class,
     //     \Illuminate\Database\Eloquent\ModelNotFoundException::class,
     //     \Illuminate\Session\TokenMismatchException::class,
     //     \Illuminate\Validation\ValidationException::class,
     //     \Illuminate\Database\QueryException::class,
     // ];

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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

            // if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            // \Session::flash('flash_message_important', 'Sorry, your session seems to have expired. Please try again.');
        
            // return redirect('/');
            // }
            
            // if (!Auth::check()) {
            //     return redirect('/');
            // }
            
            // // dd($exception);
            // if ($exception instanceof \PDOException) {
            //     return redirect('/');
            // } else {
            //     return parent::render($request, $exception);
            // }
            // if ($exception instanceof \ErrorException) {
            //     return redirect('/');
            // } else {
            //     return parent::render($request, $exception);
            // }
            return parent::render($request, $exception);
        
        
    }
    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }

    //     return redirect()->guest(route('login'));
    // }
}