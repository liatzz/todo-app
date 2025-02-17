<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Method register digunakan untuk mendaftarkan service atau binding dalam container aplikasi.
     * Biasanya digunakan untuk dependency injection atau pengaturan global yang tidak memerlukan
     * inisialisasi langsung saat aplikasi dijalankan.
     */
    public function register(): void
    {
        // Tempat untuk melakukan binding dependency injection atau menambahkan service ke container aplikasi.
        // Contoh:
        // $this->app->bind(CustomServiceInterface::class, CustomService::class);
    }

    /**
     * Method boot digunakan untuk mengeksekusi logika saat aplikasi dijalankan.
     * Di sini kita bisa melakukan konfigurasi global, seperti pengaturan schema database,
     * pengaturan URL, atau menambahkan event listener.
     */
    public function boot(): void
    {
        // Tempat untuk melakukan konfigurasi global saat aplikasi berjalan.
        // Contoh umum yang sering ditambahkan di sini:
        
        // 1. Mengatur default panjang string untuk database MySQL versi lama
        // use Illuminate\Support\Facades\Schema;
        // Schema::defaultStringLength(191);

        // 2. Memastikan aplikasi hanya berjalan dengan HTTPS di production
        // use Illuminate\Support\Facades\URL;
        // if ($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // }
    }
}
