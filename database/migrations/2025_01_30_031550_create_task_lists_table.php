<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel "task_lists".
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id(); // Membuat kolom ID sebagai primary key dengan auto increment
            $table->string('name')->unique(); // Kolom nama yang harus unik di setiap entri
            $table->timestamps(); // Menambahkan kolom "created_at" dan "updated_at"
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel "task_lists".
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists'); // Menghapus tabel "task_lists" jika ada
    }
};
