<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthenticateUser;
use App\Http\Middleware\PreventMultipleLogins;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
        ->withMiddleware(function (Illuminate\Foundation\Configuration\Middleware $middleware) {
        

        $middleware->alias([
            'block-login' => PreventMultipleLogins::class
        ]);
    })

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.custom' => AuthenticateUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
