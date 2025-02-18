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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kolom untuk nama tugas (wajib diisi)
            $table->text('description')->nullable(); // Gunakan 'text' untuk deskripsi agar lebih fleksibel
            $table->boolean('is_completed')->default(false); // Status tugas, default tidak selesai
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Prioritas tugas
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at'

            $table->unsignedBigInteger('list_id')->nullable(); // Foreign key ke tabel 'lists'
            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade'); // Jika list dihapus, task terkait juga dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks'); // Menghapus tabel jika rollback dilakukan
    }
};
