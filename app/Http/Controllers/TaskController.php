<?php

namespace App\Http\Controllers; // Menentukan namespace untuk controller ini

use App\Models\Task; // Mengimpor model Task
use App\Models\TaskList; // Mengimpor model TaskList
use Illuminate\Http\Request; // Mengimpor class Request dari Laravel untuk menangani permintaan HTTP

class TaskController extends Controller // Mendefinisikan class TaskController yang mewarisi Controller bawaan Laravel
{
    /**
     * Menampilkan daftar tugas dan list yang tersedia.
     */
    public function index() {
        $data = [
            'title' => 'Home', // Judul halaman
            'lists' => TaskList::all(), // Mengambil semua data dari tabel task_lists
            'tasks' => Task::orderBy('created_at', 'desc')->get(), // Mengambil semua task dan mengurutkannya berdasarkan tanggal pembuatan (terbaru di atas)
            'priorities' => Task::PRIORITIES // Mengambil prioritas dari konstanta PRIORITIES di model Task
        ];

        return view('pages.home', $data); // Mengembalikan view 'pages.home' dengan data yang telah dikumpulkan
    }

    /**
     * Menyimpan data tugas baru ke dalam database.
     */
    public function store(Request $request) {
        // Validasi inputan user
        $request->validate([
            'name' => 'required|max:100', // Nama task wajib diisi dan maksimal 100 karakter
            'list_id' => 'required', // ID list wajib diisi
            'description' => 'nullable|max:100',
            'priority' => 'required|in:high,medium,low',
        ]);

        // Membuat task baru dengan data dari request
        Task::create([
            'name' => $request->name, // Menyimpan nama task
            'list_id' => $request->list_id, // Menyimpan ID list tempat task tersebut berada
            'description' => $request->description,
            'priority' =>  $request->priority 
        ]);

        return redirect()->back(); // Mengembalikan user ke halaman sebelumnya setelah task berhasil ditambahkan
    }

    /**
     * Menandai task sebagai selesai.
     */
    public function complete($id) {
        // Mencari task berdasarkan ID, jika tidak ditemukan akan menampilkan error 404
        Task::findOrFail($id)->update([
            'is_completed' => true // Mengubah status task menjadi selesai
        ]);

        return redirect()->back(); // Mengembalikan user ke halaman sebelumnya setelah task ditandai selesai
    }

    /**
     * Menghapus task dari database.
     */
    public function destroy($id) {
        // Mencari task berdasarkan ID, jika tidak ditemukan akan menampilkan error 404
        Task::findOrFail($id)->delete(); // Menghapus task dari database

        return redirect()->back(); // Mengembalikan user ke halaman sebelumnya setelah task dihapus
    }
    public function show($id) {
       $task = Task::findOrFail($id); // Mencari task berdasarkan ID, jika tidak ditemukan akan menampilkan error 404
       
       $data = [
           'title' => 'Detail', // Judul halaman
           'task' => $task // Mengambil data task
       ];
       
       return view('pages.details', $data); // Mengembalikan view 'pages.detail' dengan data
    }
    public function edit($id)
    {
        // Mengambil data task berdasarkan ID
        $task = Task::findOrFail($id);
        
        // Mengarahkan ke view edit dengan data task
        return view('partials.modal', compact('task'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        // Temukan task berdasarkan ID
        $task = Task::findOrFail($id);
    
        // Update data task
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        // Redirect ke halaman detail dengan pesan sukses
        return redirect()->route('partials.modal', $task->id)
                         ->with('success', 'Tugas berhasil diperbarui!');
    }


}