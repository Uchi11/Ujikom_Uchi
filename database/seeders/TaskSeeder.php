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
                'name' => 'Belajar Laravel', // Nama tugas
                'description' => 'Belajar Laravel di santri koding', // Deskripsi tugas
                'is_completed' => false, // Status tugas, false berarti belum selesai
                'priority' => 'medium', // Prioritas tugas (low, medium, high)
                'list_id' => TaskList::where('name', 'Belajar')->first()->id, // Menghubungkan dengan list 'Belajar'
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
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
            [
                'name' => 'Cuci Baju',
                'description' => 'Cuci baju sekolah di mesin cuci',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Activity')->first()->id,
            ],
            [
                'name' => 'Belajar Python',
                'description' => 'Ulik Python di WPU',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ]
        ];

        // Memasukkan seluruh data tugas ke dalam tabel 'tasks' dalam satu query
        Task::insert($tasks);
    }
}