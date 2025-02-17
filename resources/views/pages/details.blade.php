@extends('layouts.app') <!-- Memanggil layout dasar aplikasi, yaitu file app.blade.php -->

@section('content')
    <!-- Menandai bagian konten utama dari halaman -->

    <div id="content" class="container">
        <!-- Div utama untuk membungkus semua konten, menggunakan class container untuk tata letak responsif -->
        <!-- Tombol Kembali dengan ikon panah kiri -->
        <a href="{{ route('home') }}"
            class="btn btn-outline-secondary align-items-center gap-2 shadow-sm p-2 rounded-2 transition-all duration-200 hover:scale-105">
            <i class="bi bi-arrow-left-short fs-5"></i> <!-- Ikon panah kiri -->
            <span class="fw-semibold fs-5">Kembali</span> <!-- Teks untuk tombol -->
        </a>

        <!-- Menampilkan notifikasi sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }} <!-- Menampilkan pesan sukses dari session -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <!-- Tombol untuk menutup alert -->
            </div>
        @endif

        <!-- Bagian utama halaman, dibagi menjadi dua kolom -->
        <div class="row my-2">
            <!-- Bagian Tugas (kiri) -->
            <div class="col-md-8">
                <div class="card shadow-lg rounded-3"
                    style="height: 75vh; background: linear-gradient(145deg, #e0e0e0, #ffffff);">
                    <div
                        class="card-header d-flex align-items-center justify-content-between bg-primary text-white rounded-3">
                        <div class="d-flex flex-column w-80">
                            <h3 class="fw-bold fs-4 text-truncate mb-1 d-flex align-items-center">
                                <span>{{ $task->name }}</span> <!-- Nama tugas -->
                            </h3>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-6 fw-medium text-light">
                                    <strong>List :</strong> {{ $task->list->name }} <!-- Nama list tugas -->
                                </span>
                            </div>
                        </div>
                        <!-- Tombol Edit, membuka modal edit tugas -->
                        <button type="button" class="btn btn-sm btn-outline-light d-flex align-items-center gap-1"
                            data-bs-toggle="modal" data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i> <span class="d-none d-md-inline">Edit</span>
                        </button>
                    </div>

                    <!-- Deskripsi tugas -->
                    <div class="card-body" style="min-height: 60vh;">
                        <p class="text-secondary">
                            <i class="bi bi-chat-left-text-fill text-info me-2"></i>
                            {{ $task->description }} <!-- Deskripsi tugas -->
                        </p>
                    </div>

                    <!-- Bagian footer, tombol untuk menghapus tugas -->
                    <div class="card-footer bg-light text-center py-3 d-flex justify-content-center align-items-center">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="w-100">
                            @csrf <!-- Token CSRF untuk keamanan -->
                            @method('DELETE') <!-- Metode DELETE untuk menghapus data -->
                            <button type="submit"
                                class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2 rounded-3 shadow-sm transition-all duration-200 hover:scale-105"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus tugas ini?')">
                                <i class="bi bi-trash fs-5"></i> Hapus <!-- Ikon dan teks untuk tombol hapus -->
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bagian Details (kanan) -->
            <div class="col-md-4">
                <div class="card shadow-lg rounded-3"
                    style="height: 75vh; background: linear-gradient(145deg, #f7f7f7, #ffffff);">
                    <div class="card-header bg-success text-white">
                        <h3 class="fw-bold fs-4 text-truncate mb-0">Details</h3> <!-- Judul "Details" -->
                    </div>
                    <div class="card-body d-flex flex-column gap-4">
                        <!-- Form untuk memindahkan tugas ke list lain -->
                        <h6 class="fs-6 fw-semibold text-dark">Pindah List :</h6>
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf <!-- Token CSRF untuk keamanan -->
                            @method('PATCH') <!-- Metode PATCH untuk memperbarui data -->
                            <select class="form-select p-2 rounded-3 shadow-sm border-0" name="list_id"
                                onchange="this.form.submit()"> <!-- Dropdown untuk memilih list baru -->
                                @foreach ($lists as $list)
                                    <!-- Mengiterasi semua list tugas -->
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}</option>
                                    <!-- Menampilkan nama list dan memilih list yang sedang dipilih -->
                                @endforeach
                            </select>
                        </form>

                        <!-- Menampilkan prioritas tugas -->
                        <h6 class="fs-6 fw-semibold text-dark">
                            Prioritas :
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill">
                                {{ ucfirst($task->priority) }} <!-- Menampilkan prioritas dengan styling sesuai warna -->
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Tugas -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST"
                class="modal-content border-0 rounded-4 overflow-hidden"
                style="backdrop-filter: blur(10px) saturate(180%); background: rgba(255, 255, 255, 0.12);">
                @method('PUT') <!-- Metode PUT untuk memperbarui tugas -->
                @csrf <!-- Token CSRF untuk keamanan -->
                <div class="modal-header border-0 py-2" style="background: rgba(0, 123, 255, 0.6); color: white;">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square"></i> Edit Tugas
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" value="{{ $task->list_id }}" name="list_id">
                    <!-- Menyembunyikan input untuk list_id -->

                    <!-- Input untuk nama tugas -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-white">Nama Tugas</label>
                        <input type="text" class="form-control p-2 rounded-3 shadow-sm border-0 text-white"
                            id="name" name="name" value="{{ $task->name }}" required
                            style="background: rgba(255, 255, 255, 0.2); border: none;">
                    </div>

                    <!-- Input untuk deskripsi tugas -->
                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold text-white">Deskripsi</label>
                        <textarea class="form-control p-2 rounded-3 shadow-sm border-0 text-white" name="description" id="description"
                            rows="3" required style="background: rgba(255, 255, 255, 0.2); border: none;">{{ $task->description }}</textarea>
                    </div>

                    <!-- Dropdown untuk memilih prioritas tugas -->
                    <div class="mb-3">
                        <label for="priority" class="form-label fw-semibold text-white">Prioritas</label>
                        <select class="form-select p-2 rounded-3 shadow-sm border-0 text-black" name="priority"
                            id="priority" required style="background: rgba(255, 255, 255, 0.2); border: none;">
                            <option class="text-success" value="low" @selected($task->priority == 'low')>Low</option>
                            <option class="text-warning" value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option class="text-danger" value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0 py-2" style="background: rgba(255, 255, 255, 0.15);">
                    <button type="button" class="btn btn-outline-light px-3 py-1 rounded-pill" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-light px-3 py-1 rounded-pill shadow-sm">
                        <i class="bi bi-check-circle"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
