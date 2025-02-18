<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Menggunakan string sebagai primary key, biasanya untuk sesi berbasis UUID atau hash.
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->index(); // Relasi ke tabel users, nullable untuk sesi tamu, otomatis hapus jika user dihapus.
            $table->string('ip_address', 45)->nullable(); // Menyimpan alamat IP, panjang 45 untuk mendukung IPv6.
            $table->text('user_agent')->nullable(); // Menyimpan informasi user-agent browser.
            $table->longText('payload'); // Menyimpan data sesi dalam format serialized atau JSON.
            $table->integer('last_activity')->index(); // Menyimpan waktu aktivitas terakhir sesi untuk tracking atau pembersihan otomatis.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions'); // Menghapus tabel jika rollback dilakukan.
    }
}; 