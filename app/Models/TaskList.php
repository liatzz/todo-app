<?php
// Memulai eksekusi kode PHP dalam file.

namespace App\Models;
// Menetapkan namespace App\Models, sehingga model ini bisa digunakan di bagian lain dari aplikasi Laravel dengan use App\Models\TaskList.

use Illuminate\Database\Eloquent\Model;
// Menggunakan model Eloquent dari Laravel.

class TaskList extends Model
// Mendefinisikan model Task, yang mewakili tabel tasks di database.
{
    protected $fillable = ['name'];
    // Menetapkan kolom-kolom yang bisa diisi melalui request HTTP
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    // Kolom id, created_at, dan updated_at tidak bisa diisi secara massal untuk mencegah perubahan tidak sengaja.    
    ];
    // Menetapkan kolom-kolom yang tidak bisa diisi melalui request

    public function tasks() {
        return $this->hasMany(Task::class, 
        // Mengembalikan relasi antara TaskList dan Task, dengan TaskList sebagai model
        'list_id');
    //  kolom list_id yang menyimpan ID TaskList tempat tugas tersebut berada.
    // Laravel secara otomatis mencari semua Task yang memiliki list_id yang cocok dengan id dari TaskList ini.    
    }
}
// Mengakhiri definisi model TaskList.
