<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Method ini dijalankan saat kita menjalankan perintah:
     * php artisan db:seed
     *
     * Di sini, kita memanggil seeder lain untuk mengisi tabel
     * task_lists dan tasks dengan data awal.
     */
    public function run(): void
    {
        // Memanggil TaskListSeeder untuk mengisi tabel 'task_lists' dengan data dummy
        $this->call(TaskListSeeder::class);

        // Memanggil TaskSeeder untuk mengisi tabel 'tasks' dengan data dummy
        $this->call(TaskSeeder::class);
    }
}