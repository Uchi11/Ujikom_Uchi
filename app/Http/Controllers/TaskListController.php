<?php

namespace App\Http\Controllers; // Menentukan namespace untuk controller ini

use App\Models\TaskList; // Mengimpor model TaskList untuk berinteraksi dengan tabel task_lists di database
use Illuminate\Http\Request; // Mengimpor class Request untuk menangani input dari HTTP request

class TaskListController extends Controller // Mendefinisikan class TaskListController yang mewarisi Controller bawaan Laravel
{
    /**
     * Menyimpan list tugas baru ke dalam database.
     *
     * @param \Illuminate\Http\Request $request - Permintaan HTTP yang berisi data list baru
     * @return \Illuminate\Http\RedirectResponse - Mengembalikan user ke halaman sebelumnya
     */
    public function store(Request $request)
    {
        // Validasi input yang diterima dari form
        $request->validate([
            'name' => 'required|max:100' // Nama list wajib diisi dan maksimal 100 karakter
        ]);

        // Menyimpan data list baru ke database menggunakan model TaskList
        TaskList::create([
            'name' => $request->name // Mengisi kolom 'name' dengan input dari form
        ]);

        return redirect()->back(); // Mengembalikan user ke halaman sebelumnya setelah list berhasil ditambahkan
    }

    /**
     * Menghapus list tugas berdasarkan ID.
     *
     * @param int $id - ID dari list yang akan dihapus
     * @return \Illuminate\Http\RedirectResponse - Mengembalikan user ke halaman sebelumnya
     */
    public function destroy($id)
    {
        // Mencari list berdasarkan ID, jika tidak ditemukan akan memunculkan error 404
        TaskList::findOrFail($id)->delete(); // Menghapus list dari database

        return redirect()->back(); // Mengembalikan user ke halaman sebelumnya setelah list berhasil dihapus
    }

    // public function update(Request $request, TaskList $list)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //     ]);

    //     $list->update([
    //         'name' => $request->name,
    //     ]);

    //     return redirect()->route('home')->with('success', 'List berhasil diperbarui!');
    // }
}