@extends('layouts.app')
<!-- Meng-extend layout utama 'app.blade.php' yang ada di folder layouts -->

@section('content')
    <!-- Section 'content' akan dirender di tempat @yield('content') pada layout utama -->

    <!-- Container utama dengan ID 'content' untuk mengatur konten halaman -->
    <div id="content" class="overflow-y-hidden overflow-x-hidden">

        <!-- Cek apakah belum ada list tugas yang ditambahkan -->
        @if ($lists->count() == 0)
            <!-- Tampilkan pesan jika belum ada tugas -->
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                <!-- Tombol untuk menambahkan list baru -->
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-primary"
                    style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif

        <!-- Container horizontal scroll untuk menampilkan semua list tugas -->
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">

            <!-- Looping semua daftar tugas (lists) -->
            @foreach ($lists as $list)
                <!-- Card untuk setiap list tugas -->
                <div class="card flex-shrink-0 shadow-sm" style="width: 18rem; max-height: 80vh; border-radius: 10px;">

                    <!-- Header card dengan nama list dan tombol hapus -->
                    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between"
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="card-title">{{ $list->name }}</h4>

                        <!-- Form untuk menghapus list -->
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf <!-- Token untuk melindungi dari serangan CSRF -->
                            @method('DELETE') <!-- Mengubah metode HTTP menjadi DELETE -->
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-white"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Body card yang berisi tugas-tugas dalam list ini -->
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">

                        <!-- Looping untuk menampilkan semua tugas dalam list ini -->
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <!-- Cek apakah tugas ini milik list saat ini -->

                                <!-- Card untuk setiap tugas -->
                                <div class="card mb-3 border-light" style="border-radius: 10px;">

                                    <!-- Header tugas yang menampilkan nama dan prioritas -->
                                    <div class="card-header bg-light">
                                        <div class="d-flex align-items-center justify-content-between">

                                            <!-- Informasi nama tugas dan prioritas -->
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <a href="{{ route('tasks.show', $task->id) }}"
                                                    {{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                                                    {{ $task->name }}
                                                </a>

                                                <!-- Badge prioritas dengan warna sesuai level -->
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content;">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>

                                            <!-- Form untuk menghapus tugas -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Deskripsi tugas -->
                                    <div class="card-body">
                                        <p class="card-text text-truncate">{{ $task->description }}</p>
                                    </div>

                                    <!-- Tombol untuk menandai tugas sebagai selesai jika belum selesai -->
                                    @if (!$task->is_completed)
                                        <div class="card-footer bg-light text-center"
                                            style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH') <!-- Metode HTTP untuk update status -->
                                                <button type="submit" class="btn btn-sm btn-success w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i> Selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                        <!-- Tombol untuk menambahkan tugas baru dalam list ini -->
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i> Tambah
                            </span>
                        </button>
                    </div>

                    <!-- Footer card yang menunjukkan jumlah tugas dalam list -->
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center"
                        style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach

            <!-- Tombol untuk menambahkan list baru -->
            <button type="button" class="btn btn-outline-primary flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i> Tambah
                </span>
            </button>
        </div>
    </div>
@endsection
