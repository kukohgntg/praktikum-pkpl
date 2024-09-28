<?php

use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyGuest;
use App\Http\Middleware\OnlyClient;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        // health: '/up',
        health: '/status',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['onlyadmin', OnlyAdmin::class]);
        $middleware->alias(['onlyclient', OnlyClient::class]);
        $middleware->alias(['onlyguest', OnlyGuest::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
