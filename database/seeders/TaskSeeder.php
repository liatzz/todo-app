<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'name' => 'Belajar Laravel',
                'description' => 'Belajar Laravel di santri koding',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
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
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
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
                'list_id' => TaskList::where('name', 'Healing')->first()->id,
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
                'list_id' => TaskList::where('name', 'Acara Keluarga')->first()->id,
            ],
        ];

        Task::insert($tasks);
    }
}
