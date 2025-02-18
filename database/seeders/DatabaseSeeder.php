<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Method ini digunakan untuk melakukan seeding ke database.
     * Seeding adalah proses mengisi database dengan data awal (dummy data).
     */
    public function run(): void
    {
        // Memanggil seeder TaskListSeeder untuk mengisi tabel task_lists dengan data awal.
        $this->call(TaskListSeeder::class);

        // Memanggil seeder TaskSeeder untuk mengisi tabel tasks dengan data awal.
        $this->call(TaskSeeder::class);
    }
}
