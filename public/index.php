<?php

use Illuminate\Http\Request;

// Menentukan waktu mulai eksekusi Laravel
define('LARAVEL_START', microtime(true));

// Mengecek apakah aplikasi sedang dalam mode pemeliharaan
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance; // Jika file maintenance.php ada, aplikasi akan masuk mode pemeliharaan
}

// Memuat autoloader Composer untuk memuat dependensi Laravel
require __DIR__.'/../vendor/autoload.php';

// Mem-bootstrapping aplikasi Laravel dan menangani request yang masuk
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture()); // Mengambil request HTTP dan memprosesnya
