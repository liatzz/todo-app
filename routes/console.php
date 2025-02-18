<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Menambahkan perintah Artisan kustom 'inspire'
// Perintah ini akan menampilkan kutipan inspiratif setiap kali dijalankan
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote()); // Mengambil dan menampilkan kutipan dari kelas Inspiring
})->purpose('Display an inspiring quote') // Menjelaskan tujuan perintah saat menjalankan 'php artisan list'
  ->hourly(); // Perintah ini dijadwalkan untuk berjalan setiap jam jika digunakan dalam scheduler
