<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'RoleMiddleware' => \App\Http\Middleware\RoleMiddleware::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'checkRole' => \App\Http\Middleware\CheckRole::class,
            'SetIntendedUrl' => \App\Http\Middleware\SetIntendedUrl::class
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
