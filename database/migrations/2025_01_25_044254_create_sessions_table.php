<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     * 
     * Fungsi ini membuat tabel 'sessions' yang digunakan untuk menyimpan data sesi pengguna.
     * Tabel ini penting untuk mengelola autentikasi dan menjaga informasi sesi aktif.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            // Kolom 'id' sebagai primary key bertipe string untuk menyimpan ID sesi unik
            $table->string('id')->primary();
            
            // Kolom 'user_id' sebagai foreign key yang merujuk ke tabel 'users' untuk mengaitkan sesi dengan pengguna.
            // Kolom ini nullable karena sesi bisa saja milik pengguna yang belum login (guest).
            $table->foreignId('user_id')->nullable()->index();

            // Kolom 'ip_address' untuk menyimpan alamat IP pengguna. Maksimal 45 karakter (mendukung IPv4 dan IPv6).
            $table->string('ip_address', 45)->nullable();
            
            // Kolom 'user_agent' untuk menyimpan informasi user agent (browser atau aplikasi yang digunakan).
            $table->text('user_agent')->nullable();
            
            // Kolom 'payload' menyimpan data sesi dalam format teks panjang (serialized data).
            $table->longText('payload');
            
            // Kolom 'last_activity' menyimpan timestamp aktivitas terakhir pengguna.
            // Diindeks untuk mempercepat query saat memeriksa sesi aktif atau membersihkan sesi yang kadaluarsa.
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Membalikkan migrasi.
     * 
     * Fungsi ini menghapus tabel 'sessions' jika ada rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};