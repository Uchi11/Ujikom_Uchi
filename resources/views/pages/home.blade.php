@extends('layouts.app') <!-- Menggunakan layout utama 'app' -->

@section('content')
    <!-- Bagian konten yang akan di-render di layout -->
    <div id="content" class="overflow-y-hidden overflow-x-hidden">
        <!-- Memeriksa apakah belum ada list tugas yang ditambahkan -->
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                <!-- Tombol Tambah List muncul hanya saat belum ada list -->
                <button type="button" class="btn btn-primary d-flex align-items-center gap-2 mt-3" data-bs-toggle="modal"
                    data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-4"></i> Tambah List
                </button>
            </div>
        @endif

        @if ($lists->count() > 0)
            <!-- Tombol Tambah List tetap muncul meskipun sudah ada list -->
            <div class="d-flex justify-content-center mb-4">
                <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal"
                    data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-4"></i> Tambah List
                </button>
            </div>
        @endif

        <!-- Container dengan horizontal scroll untuk menampilkan semua list tugas -->
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
            @foreach ($lists as $list)
                <div class="card flex-shrink-0 shadow-sm" style="width: 18rem; max-height: 80vh; border-radius: 10px;">

                    <!-- Header Card untuk setiap List Tugas -->
                    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between"
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h4 class="card-title">{{ $list->name }}</h4>

                        <!-- Form untuk menghapus list -->
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-white"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Body Card untuk menampilkan tugas-tugas di dalam list -->
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <div class="card mb-3 border-light" style="border-radius: 10px;">
                                    <div class="card-header bg-light">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <!-- Link untuk melihat detail tugas -->
                                                <a href="{{ route('tasks.show', $task->id) }}"
                                                    class="{{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                                                    {{ $task->name }}
                                                </a>
                                                <!-- Menampilkan prioritas tugas sebagai badge -->
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill">
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

                                    <!-- Tombol untuk menandai tugas sebagai selesai -->
                                    @if (!$task->is_completed)
                                        <div class="card-footer bg-light text-center">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success w-100">
                                                    <i class="bi bi-check fs-5"></i> Selesai
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                        <!-- Tombol untuk menambahkan tugas baru dalam list ini -->
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <i class="bi bi-plus fs-5"></i> Tambah Tugas
                        </button>
                    </div>

                    <!-- Footer Card untuk menampilkan jumlah tugas dalam list -->
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
