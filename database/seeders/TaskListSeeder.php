<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListSeeder extends Seeder
{
    /**
     * Method ini digunakan untuk menambahkan data awal ke dalam tabel task_lists.
     */
    public function run(): void
    {
        // Data yang akan dimasukkan ke dalam tabel task_lists
        $lists = [
            ['name' => 'Liburan'], // Daftar tugas untuk liburan
            ['name' => 'Belajar'], // Daftar tugas untuk belajar
            ['name' => 'Tugas'], // Daftar tugas umum
            ['name' => 'Healing'], // Daftar tugas untuk refreshing
            ['name' => 'Acara Keluarga'], // Daftar tugas untuk event keluarga
        ];

        // Memasukkan data langsung ke dalam database menggunakan insert()
        TaskList::insert($lists);
    }
}
