<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Method ini akan dieksekusi saat migrasi dijalankan.
     * Digunakan untuk membuat tabel 'tasks' di database.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Primary key dengan tipe data BIGINT dan auto-increment.
            $table->string('name'); // Nama tugas, menggunakan tipe VARCHAR.
            $table->string('description')->nullable(); // Deskripsi tugas, opsional (nullable).
            $table->boolean('is_completed')->default(false); // Status tugas (selesai atau belum), default false.
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Prioritas tugas, dengan nilai default 'medium'.
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at' otomatis.

            // Foreign key ke tabel 'task_lists', jika list dihapus maka semua tugas terkait ikut terhapus (cascade).
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Method ini akan dieksekusi saat migrasi di-rollback.
     * Digunakan untuk menghapus tabel 'tasks' jika perlu dikembalikan ke kondisi sebelumnya.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks'); // Hapus tabel 'tasks' jika ada.
    }
};
