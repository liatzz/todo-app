<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__)) // Menentukan base path aplikasi, biasanya ke direktori root proyek
    ->withRouting( // Mengonfigurasi pengaturan routing untuk aplikasi
        web: __DIR__.'/../routes/web.php', // Menentukan path untuk routing web
        commands: __DIR__.'/../routes/console.php', // Menentukan path untuk routing perintah console
        health: '/up', // Menentukan route untuk health check di '/up'
    )
    ->withMiddleware(function (Middleware $middleware) { // Menyediakan callback untuk mengonfigurasi middleware
        //
    })
    ->withExceptions(function (Exceptions $exceptions) { // Menyediakan callback untuk menangani pengecualian
        //
    })->create(); // Membuat dan mengembalikan instance aplikasi
