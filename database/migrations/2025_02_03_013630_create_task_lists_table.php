<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     * 
     * Fungsi ini akan membuat tabel 'task_lists' yang digunakan untuk menyimpan daftar tugas 
     * dalam aplikasi To-Do List.
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            // Kolom 'id' sebagai primary key dengan auto-increment (big integer secara default).
            $table->id();

            // Kolom 'name' untuk menyimpan nama daftar tugas.
            // Kolom ini memiliki constraint unique agar tidak ada dua daftar tugas dengan nama yang sama.
            $table->string('name')->unique();

            // Kolom 'created_at' dan 'updated_at' otomatis ditambahkan untuk mencatat waktu pembuatan
            // dan pembaruan terakhir dari setiap record.
            $table->timestamps();
        });
    }

    /**
     * Membalikkan migrasi.
     * 
     * Fungsi ini akan menghapus tabel 'task_lists' jika migrasi di-rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists');
    }
};