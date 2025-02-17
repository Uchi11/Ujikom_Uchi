<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');
// Route untuk halaman utama, menggunakan method 'index' pada TaskController. Nama route adalah 'home'.

// Mendefinisikan resource route untuk Task List (CRUD)
Route::resource('lists', TaskListController::class);
// Ini akan membuat route otomatis untuk operasi CRUD (Create, Read, Update, Delete) pada TaskListController.

// Mendefinisikan resource route untuk Task (CRUD)
Route::resource('tasks', TaskController::class);
// Ini akan membuat route otomatis untuk operasi CRUD (Create, Read, Update, Delete) pada TaskController.

// Mendefinisikan route patch untuk menyelesaikan task
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
// Ini adalah route untuk menyelesaikan tugas, memanggil method 'complete' pada TaskController dan nama route adalah 'tasks.complete'.

// Mendefinisikan route patch untuk mengubah task ke dalam list lain
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');
// Route ini digunakan untuk memindahkan task ke dalam list yang berbeda, memanggil method 'changeList' pada TaskController dan nama route adalah 'tasks.changeList'.

// Route untuk halaman profil pengguna
Route::get('/profile', function () {
    return view('profile', ['title' => 'Profil Saya']);
})->name('profile');
// Route untuk menampilkan halaman profil, mengirimkan data ke view 'profile' dengan title 'Profil Saya' dan nama route 'profile'.

// Route untuk halaman "About"
Route::get('/about', function () {
    return view('about', ['title' => 'About TodoApp']);
})->name('about');
// Route untuk menampilkan halaman "About", mengirimkan data ke view 'about' dengan title 'About TodoApp' dan nama route 'about'.