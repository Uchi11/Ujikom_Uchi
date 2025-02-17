<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Method ini digunakan untuk mengisi tabel 'task_lists' dengan data awal.
     * Data ini dapat digunakan untuk pengujian atau sebagai data default aplikasi.
     */
    public function run(): void
    {
        // Array berisi daftar task list yang akan dimasukkan ke dalam database
        $lists = [
            [
                'name' => 'Liburan',  // List untuk rencana atau kegiatan liburan
            ],
            [
                'name' => 'Tugas',    // List untuk tugas-tugas penting
            ],
        ];

        // Memasukkan data ke dalam tabel 'task_lists' menggunakan metode insert
        TaskList::insert($lists);
    }
}