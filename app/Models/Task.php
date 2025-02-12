<?php

namespace App\Models; // Menentukan namespace untuk model ini

use Illuminate\Database\Eloquent\Model; // Mengimpor model dasar Eloquent dari Laravel
use App\Models\TaskList; // Mengimpor model TaskList untuk relasi antar tabel

class Task extends Model // Mendefinisikan class Task yang mewarisi Eloquent Model
{
    /**
     * Menentukan kolom-kolom yang bisa diisi (mass assignable).
     * Kolom ini bisa diisi langsung menggunakan metode create() atau fill().
     */
    protected $fillable = [
        'name',         // Nama tugas
        'description',  // Deskripsi tugas
        'is_completed', // Status apakah tugas sudah selesai atau belum
        'priority',     // Prioritas tugas (low, medium, high)
        'list_id'       // ID dari list yang terkait dengan tugas ini
    ];

    /**
     * Menentukan kolom-kolom yang tidak bisa diisi secara massal.
     * Biasanya untuk melindungi kolom seperti id atau timestamp.
     */
    protected $guarded = [
        'id',           // ID unik dari tugas, tidak boleh diubah secara langsung
        'created_at',   // Timestamp saat tugas dibuat
        'updated_at'    // Timestamp saat tugas diperbarui
    ];

    /**
     * Konstanta PRIORITIES berisi daftar prioritas yang bisa digunakan untuk tugas.
     */
    const PRIORITIES = [
        'low',     // Prioritas rendah
        'medium',  // Prioritas sedang
        'high'     // Prioritas tinggi
    ];

    /**
     * Accessor untuk mendapatkan class CSS berdasarkan prioritas tugas.
     * Ini berguna untuk memberikan warna atau gaya visual pada tampilan.
     *
     * @return string - Class CSS yang sesuai dengan prioritas tugas
     */
    public function getPriorityClassAttribute() {
        return match($this->attributes['priority']) { // Menggunakan match expression untuk memetakan prioritas ke class CSS
            'low' => 'success',    // Jika prioritas 'low', class CSS adalah 'success(Hijau)'
            'medium' => 'warning', // Jika prioritas 'medium', class CSS adalah 'warning(Kuning)'
            'high' => 'danger',    // Jika prioritas 'high', class CSS adalah 'danger(Merah)'
            default => 'secondary' // Jika tidak ada yang cocok, gunakan class 'secondary(Abu-abu)'
        };
    }

    /**
     * Relasi antara Task dan TaskList.
     * Setiap tugas (Task) *belongs to* satu daftar tugas (TaskList).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id'); // Menyatakan bahwa task ini terkait dengan satu TaskList melalui foreign key 'list_id'
    }
}