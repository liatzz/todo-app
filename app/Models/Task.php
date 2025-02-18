<?php
// Memulai eksekusi kode PHP dalam file.

namespace App\Models;
// Kode ini mendefinisikan namespace untuk model Task dalam direktori App\Models.

use Illuminate\Database\Eloquent\Model;
// Kode ini menggunakan kelas Model dari paket Eloquent untuk mendefinisikan model Task
use App\Models\TaskList;
// Kode ini menggunakan kelas TaskList dari direktori App\Models untuk mendefinisikan model

class Task extends Model
// Mendefinisikan model Task, yang mewakili tabel tasks di database.
{
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'tasks',
         'list_id'
    // $fillable → Daftar kolom yang boleh diisi secara massal (mass assignment) saat membuat atau memperbarui data.
    // Artinya, kolom name, description, is_completed, priority, list_id bisa diisi langsung menggunakan metode create() atau update() tanpa perlu request->validate() secara manual.    
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    // $guarded → Daftar kolom yang tidak boleh diisi secara massal.
    // id, created_at, updated_at tidak bisa diubah langsung menggunakan mass assignment.    
    ];

    protected $table = 'tasks';

    const PRIORITIES = [
        'low',
        'medium',
        'high'
    // Konstanta ini digunakan untuk mendefinisikan nilai prioritas tugas (low, medium, high), yang bisa digunakan dalam validasi atau tampilan UI.
    ];

    public function getPriorityClassAttribute() {
        // Fungsi ini digunakan untuk mendapatkan kelas CSS berdasarkan prioritas 
        return match($this->attributes['priority']) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
        // Fungsi ini menggunakan sintaks match untuk mendapatkan kelas CSS berdasarkan prior
    }
    // Fungsi ini digunakan untuk mendapatkan kelas CSS berdasarkan prioritas t

    public function list() {
    // Mendefinisikan relasi satu ke banyak (many-to-one), bahwa setiap tugas (Task) milik satu daftar tugas (TaskList).
        return $this->belongsTo
        (TaskList::class, 'list_id');
    // adalah metode relasi Eloquent dalam Laravel yang menunjukkan bahwa model Task memiliki hubungan many-to-one (banyak ke satu) dengan model TaskList.    
    }
}
// Kode ini mendefinisikan model Task, yang memiliki atribut fillable, guarded,
