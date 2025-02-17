<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Method ini akan mengisi tabel 'tasks' dengan data awal yang terhubung 
     * ke daftar tugas di tabel 'task_lists'. Data ini berguna untuk pengujian
     * atau sebagai data default aplikasi.
     */
    public function run(): void
    {
        // Array berisi daftar tugas yang akan dimasukkan ke dalam tabel 'tasks'
        $tasks = [
            [
                'name' => 'Gunung',
                'description' => 'Mendaki gunung bersama teman tongkrongan',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke villa bersama teman sekolah',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'B. Inggris',
                'description' => 'Membuat ringkasan Encyclopedia',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi Pak Budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todoapp Laravel',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
        ];

        // Memasukkan seluruh data tugas ke dalam tabel 'tasks' dalam satu query
        Task::insert($tasks);
    }
}