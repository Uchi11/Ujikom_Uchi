<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Menggunakan class anonim (anonymous class) untuk mendefinisikan migrasi ini.
// Class ini mewarisi (extends) dari class 'Migration' bawaan Laravel, 
// yang menyediakan metode 'up' dan 'down' untuk mengatur pembuatan dan penghapusan tabel.
return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     * 
     * Fungsi 'up' bertugas membuat struktur tabel baru dalam database.
     * Dalam kasus ini, tabel 'tasks' akan dibuat untuk menyimpan data tugas individu 
     * yang terhubung dengan daftar tugas.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            // Membuat kolom 'id' sebagai primary key dengan auto-increment.
            // Tipe data yang digunakan adalah big integer.
            $table->id();

            // Kolom 'name' untuk menyimpan nama atau judul tugas.
            $table->string('name');

            // Kolom 'description' untuk menyimpan deskripsi tambahan tugas.
            // Kolom ini opsional, sehingga bisa bernilai null jika tidak ada deskripsi.
            $table->string('description')->nullable();

            // Kolom 'is_completed' bertipe boolean untuk menunjukkan status penyelesaian tugas.
            // Default-nya adalah 'false' yang berarti tugas belum diselesaikan.
            $table->boolean('is_completed')->default(false);

            // Kolom 'priority' menggunakan enum untuk menyimpan prioritas tugas.
            // Hanya menerima nilai 'low', 'medium', atau 'high', dengan 'medium' sebagai default.
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');

            // Kolom 'created_at' dan 'updated_at' akan otomatis diisi oleh Laravel 
            // untuk mencatat waktu pembuatan dan pembaruan tugas.
            $table->timestamps();

            // Kolom 'list_id' sebagai foreign key yang menghubungkan tugas dengan tabel 'task_lists'.
            // 'onDelete('cascade')' memastikan bahwa jika daftar tugas dihapus, 
            // semua tugas yang terkait juga akan ikut terhapus.
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Membalikkan migrasi.
     * 
     * Fungsi 'down' bertugas untuk menghapus tabel jika migrasi di-rollback.
     * Ini memungkinkan pengembalian perubahan struktur database ke kondisi sebelumnya.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};