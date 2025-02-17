<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar tugas dan task list.
     * 
     * Jika ada input pencarian, maka akan menampilkan tugas dan task list yang sesuai dengan query pencarian.
     * Pencarian dilakukan berdasarkan nama atau deskripsi tugas, atau berdasarkan nama task list yang berisi tugas yang sesuai.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = $request->input('query'); // Mendapatkan input pencarian dari request

        if ($query) {
            // Jika ada query pencarian, cari tugas berdasarkan nama atau deskripsi
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest() // Menampilkan tugas terbaru
                ->get();

            // Cari task list yang sesuai dengan pencarian
            $lists = TaskList::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%")
                    ->orWhereHas('tasks', function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%");
                    });
            })->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua tugas dan task list
            $tasks = Task::latest()->get();
            $lists = TaskList::all();
        }

        // Mengirim data ke view
        return view('pages.home', [
            'title' => 'Home', // Judul halaman
            'lists' => $lists, // Daftar task list
            'tasks' => $tasks, // Daftar tugas
            'priorities' => Task::PRIORITIES // Daftar prioritas tugas
        ]);
    }

    /**
     * Menyimpan tugas baru.
     * 
     * Setelah memvalidasi data input (seperti nama, deskripsi, task list, dan prioritas), tugas baru akan disimpan ke dalam database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input yang diterima dari form
        $request->validate([
            'name' => 'required|max:100', // Nama tugas wajib diisi, maksimal 100 karakter
            'description' => 'max:255', // Deskripsi tugas opsional, maksimal 255 karakter
            'list_id' => 'required', // Task list wajib diisi
            'priority' => 'required|in:low,medium,high' // Prioritas harus diisi dan bernilai low, medium, atau high
        ]);

        // Menyimpan data tugas baru ke database
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'list_id' => $request->list_id,
            'priority' => $request->priority
        ]);

        // Mengalihkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    /**
     * Menandai tugas sebagai selesai.
     * 
     * Setelah tugas selesai, status `is_completed` diubah menjadi true.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function complete($id)
    {
        // Mencari tugas berdasarkan ID dan menandainya sebagai selesai
        Task::findOrFail($id)->update([
            'is_completed' => true // Tandai tugas sebagai selesai
        ]);

        // Mengalihkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    /**
     * Menghapus tugas berdasarkan ID.
     * 
     * Fungsi ini akan menghapus tugas yang dipilih dari database.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Mencari tugas berdasarkan ID dan menghapusnya
        Task::findOrFail($id)->delete();

        // Mengalihkan kembali ke halaman utama
        return redirect()->route('home');
    }

    /**
     * Menampilkan detail tugas berdasarkan ID.
     * 
     * Fungsi ini akan menampilkan halaman dengan detail tugas yang dipilih berdasarkan ID.
     * 
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Mengirim data tugas yang dipilih dan daftar task list ke view
        return view('pages.details', [
            'title' => 'Task', // Judul halaman
            'lists' => TaskList::all(), // Daftar task list
            'task' => Task::findOrFail($id) // Tugas berdasarkan ID
        ]);
    }

    /**
     * Memindahkan tugas ke task list yang berbeda.
     * 
     * Fungsi ini akan memperbarui task list dari tugas yang sudah ada berdasarkan input dari form.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeList(Request $request, Task $task)
    {
        // Validasi ID task list yang baru
        $request->validate([
            'list_id' => 'required|exists:task_lists,id', // Pastikan task list yang dipilih valid
        ]);

        // Memperbarui task list tugas
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        // Kembali dengan pesan sukses
        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    /**
     * Memperbarui detail tugas.
     * 
     * Fungsi ini akan memperbarui informasi tugas seperti nama, deskripsi, prioritas, dan task list.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        // Validasi input yang diterima dari form
        $request->validate([
            'list_id' => 'required', // Task list wajib diisi
            'name' => 'required|max:100', // Nama tugas wajib diisi, maksimal 100 karakter
            'description' => 'max:255', // Deskripsi tugas opsional, maksimal 255 karakter
            'priority' => 'required|in:low,medium,high' // Prioritas harus diisi dan salah satu dari low, medium, atau high
        ]);

        // Memperbarui data tugas berdasarkan ID
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        // Kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}