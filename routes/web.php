<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');

// Membuat route resource untuk Task List
Route::resource('lists', TaskListController::class);

// Membuat route resource untuk Task
Route::resource('tasks', TaskController::class);

// Membuat route untuk menyelesaikan task
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');