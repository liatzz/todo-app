<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Method ini digunakan untuk menambahkan data awal ke dalam tabel tasks.
     */
    public function run(): void
    {
        // Array berisi daftar tugas yang akan dimasukkan ke dalam tabel tasks.
        $tasks = [
            [
                'name' => 'Belajar Laravel',
                'description' => 'Belajar Laravel di santri koding',
                'is_completed' => false, // Status tugas belum selesai
                'priority' => 'medium', // Prioritas tugas sedang
                'list_id' => TaskList::where('name', 'Belajar')->first()->id, // Menghubungkan dengan daftar "Belajar"
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true, // Tugas sudah selesai
                'priority' => 'high', // Prioritas tinggi
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id, // Menghubungkan dengan daftar "Liburan"
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke Villa bersama teman sekolah',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Matematika',
                'description' => 'Tugas Matematika bu Nina',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id, // Menghubungkan dengan daftar "Tugas"
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi pa budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todo App untuk ujikom',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Pemancingan',
                'description' => 'Mancing untuk menghilangkan jenuh',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Healing')->first()->id, // Menghubungkan dengan daftar "Healing"
            ],
            [
                'name' => 'Ciater',
                'description' => 'Berendam di pemandian air panas',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Healing')->first()->id,
            ],
            [
                'name' => 'Tangkuban Perahu',
                'description' => 'Pemandangan alam yang indah',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Healing')->first()->id,
            ],
            [
                'name' => 'Kebun Teh',
                'description' => 'Refresh otak foto foto',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Healing')->first()->id,
            ],
            [
                'name' => 'Karawang',
                'description' => 'Mengunjungi saudara di karawang',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Acara Keluarga')->first()->id, // Menghubungkan dengan daftar "Acara Keluarga"
            ],
        ];

        // Memasukkan data langsung ke dalam database menggunakan insert()
        Task::insert($tasks);
    }
}
