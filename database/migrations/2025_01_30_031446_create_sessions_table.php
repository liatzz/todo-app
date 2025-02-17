<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel "sessions".
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID sesi sebagai primary key
            $table->foreignId('user_id')->nullable()->index(); // ID pengguna, bisa null, dengan indeks untuk mempercepat pencarian
            $table->string('ip_address', 45)->nullable(); // Menyimpan alamat IP pengguna, bisa null
            $table->text('user_agent')->nullable(); // Menyimpan informasi user agent (browser/device) pengguna, bisa null
            $table->longText('payload'); // Menyimpan data sesi dalam bentuk teks panjang
            $table->integer('last_activity')->index(); // Menyimpan waktu terakhir aktivitas pengguna dengan indeks agar lebih cepat di-query
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel "sessions".
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions'); // Menghapus tabel sessions jika ada
    }
};
