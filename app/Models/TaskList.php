<?php

namespace App\Models;  // Menentukan namespace untuk model ini

use Illuminate\Database\Eloquent\Model; // Mengimpor Eloquent Model bawaan Laravel

class TaskList extends Model
{
     /**
     * Menentukan kolom yang bisa diisi (mass assignable).
     * Kolom ini bisa diisi langsung menggunakan metode create() atau fill().
     */
    protected $fillable = ['name']; // Hanya kolom 'name' yang dapat diisi secara massal
    /**
     * Menentukan kolom-kolom yang tidak bisa diisi secara massal.
     * Biasanya untuk melindungi kolom seperti id dan timestamps.
     */
    protected $guarded = [
        'id',           // ID unik dari TaskList, tidak bisa diubah secara langsung
        'created_at',   // Waktu saat TaskList dibuat
        'updated_at'    // Waktu saat TaskList diperbarui
    ];
    
    /**
     * Relasi antara TaskList dan Task.
     * Satu TaskList dapat memiliki banyak Task (one-to-many relationship).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
        // Menyatakan bahwa satu TaskList memiliki banyak Task, dengan foreign key 'list_id' di tabel tasks
    }
}