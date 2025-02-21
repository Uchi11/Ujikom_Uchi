@extends('layouts.app')
<!-- Menggunakan layout 'app' sebagai struktur dasar halaman, di mana konten akan dimuat -->

@section('content')
    <div id="content" class="overflow-hidden mt-6">
        <!-- Membuat div dengan ID 'content', memberikan margin atas 6 dan menyembunyikan overflow -->

        <div class="d-flex justify-content-between align-items-center mb-4 px-4">
            <!-- Membuat container flex yang membagi ruang secara merata, dengan jarak antar item dan padding pada sisi kiri-kanan -->

            <div class="col-4">
                <!-- Membuat kolom dengan lebar 4 dari total 12 kolom (Bootstrap Grid System) -->

                <form action="{{ route('home') }}" method="GET" class="input-group shadow-sm">
                    <!-- Membuat form dengan metode GET dan mengarahkan ke route 'home'. Form ini berfungsi untuk mencari tugas -->
                    <input type="text" class="form-control border border-primary rounded-start-pill" name="query"
                        placeholder="Cari tugas atau list..." value="{{ request()->query('query') }}"
                        style="border-width: 2px;">
                    <!-- Input text untuk pencarian tugas atau list, dengan styling dan border khusus -->

                    <button type="submit" class="btn btn-primary rounded-end-pill">
                        <i class="bi bi-search"></i>
                    </button>
                    <!-- Tombol untuk submit form pencarian, dengan ikon pencarian -->
                </form>
            </div>

            @if ($lists->count() !== 0)
                <!-- Jika ada list, tampilkan tombol untuk menambah list baru -->
                <button type="button"
                    class="btn btn-outline-primary flex-shrink-0 rounded-lg p-2 shadow-sm d-flex align-items-center justify-content-center gap-2 transition"
                    style="width: 12rem; height: auto;" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus-circle fs-5"></i>
                    <span>Add List</span>
                </button>
            @endif

            <div class="d-flex gap-3">
                <!-- Div flex yang menampung beberapa informasi dan statistik terkait tugas -->

                <div class="d-flex align-items-center p-3 rounded shadow-sm"
                    style="background: linear-gradient(135deg, #007bff, #0056b3); color: white;">
                    <!-- Menampilkan statistik "Total List" dengan latar belakang gradien biru -->
                    <i class="bi bi-list-task fs-5 me-2"></i>
                    <span class="fw-semibold">Total List:</span>
                    <span class="ms-1">{{ $lists->count() }}</span>
                    <!-- Menampilkan jumlah list tugas -->
                </div>

                <div class="d-flex align-items-center p-3 rounded shadow-sm"
                    style="background: linear-gradient(135deg, #6c757d, #343a40); color: white;">
                    <!-- Menampilkan statistik "Total Tugas" dengan latar belakang gradien abu-abu -->
                    <i class="bi bi-clipboard-check fs-5 me-2"></i>
                    <span class="fw-semibold">Total Tugas:</span>
                    <span class="ms-1">{{ $lists->sum(fn($list) => $list->tasks->count()) }}</span>
                    <!-- Menghitung dan menampilkan total tugas dari semua list -->
                </div>

                <div class="d-flex align-items-center p-3 rounded shadow-sm"
                    style="background: linear-gradient(135deg, #28a745, #1e7e34); color: white;">
                    <!-- Menampilkan statistik "Tugas Selesai" dengan latar belakang gradien hijau -->
                    <i class="bi bi-check-circle fs-5 me-2"></i>
                    <span class="fw-semibold">Tugas Selesai:</span>
                    <span class="ms-1">{{ $lists->sum(fn($list) => $list->tasks->where('is_completed', true)->count()) }}
                    </span>
                    <!-- Menghitung dan menampilkan jumlah tugas yang telah selesai dari semua list -->
                </div>
            </div>
        </div>
    </div>

    @if ($lists->count() == 0)
        <!-- Jika tidak ada list yang tersedia, tampilkan pesan ini -->
        <div class="d-flex flex-column align-items-center justify-content-center vh-50">
            <!-- Mengatur tampilan agar konten terpusat secara vertikal -->

            <div class="card p-4 shadow-sm border-0 text-center d-flex align-items-center" style="max-width: 500px;">
                <!-- Menampilkan kartu dengan pesan jika belum ada tugas, diatur agar tidak terlalu lebar -->

                <div class="card-body text-center">
                    <i class="bi bi-clipboard-x text-danger" style="font-size: 4rem;"></i>
                    <!-- Menampilkan ikon dengan ukuran besar dan warna merah sebagai indikator tidak ada tugas -->

                    <h5 class="fw-bold mt-3">Belum ada tugas</h5>
                    <p class="text-muted">Buat tugas pertama Anda untuk memulai produktivitas!</p>
                    <!-- Teks yang memberikan informasi bahwa belum ada tugas -->

                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2 shadow-lg"
                            data-bs-toggle="modal" data-bs-target="#addListModal"
                            style="transition: 0.3s; border-radius: 50px;">
                            <i class="bi bi-plus-circle fs-5"></i>
                            <span class="fw-bold">Tambah Tugas</span>
                        </button>
                        <!-- Tombol untuk menambah tugas baru dengan animasi transisi dan efek -->
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="d-grid gap-3 px-3" style="grid-template-columns: repeat(auto-fill, minmax(18rem, 1fr));">
        <!-- Menampilkan list tugas dalam bentuk horizontal dengan scroll, sehingga jika ada banyak list bisa discroll -->

        @foreach ($lists as $list)
            <!-- Loop untuk menampilkan setiap list tugas -->

            <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                <!-- Menampilkan kartu untuk setiap list tugas dengan ukuran tetap -->


                <!-- action="{{ route('lists.destroy', $list->id) }}":  URL tujuan untuk form ini adalah rute 'lists.destroy' yang menerima parameter $list->id.Ini mengarah ke metode 'destroy' di controller yang akan menghapus daftar berdasarkan ID yang diberikan -->
                    
                <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                    <!-- Menampilkan Nama List -->
                    <h4 class="card-title m-0">{{ $list->name }}</h4>

                    <div class="d-flex gap-2">
                        <!-- Tombol Edit -->
                        {{-- <button type="button" class="btn btn-sm btn-light text-primary" data-bs-toggle="modal"
                            data-bs-target="#editListModal" onclick="editList({{ $list->id }}, '{{ $list->name }}')">
                            <i class="bi bi-pencil-square fs-5"></i>
                        </button> --}}

                        <!-- Tombol Hapus -->
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light text-danger">
                                <i class="bi bi-trash3 fs-6"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                    <!-- Body kartu yang berisi daftar tugas pada list ini -->

                    @foreach ($list->tasks as $task)
                        <!-- Loop untuk menampilkan setiap tugas di dalam list -->

                        <div class="card">
                            <!-- Kartu untuk menampilkan tugas -->

                            <div class="card-header">
                                <!-- Header kartu tugas -->

                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Membuat layout fleksibel di header tugas -->

                                    <div class="d-flex flex-column gap-1">
                                        <!-- Kolom untuk menampilkan nama tugas dan prioritas -->

                                        <div class="d-flex align-items-center gap-2">
                                            <!-- Menampilkan prioritas tugas dengan spinner untuk tugas prioritas tinggi -->
                                            @if ($task->priority == 'high' && !$task->is_completed)
                                                <div class="spinner-grow spinner-grow-sm text-{{ $task->priorityClass }}"
                                                    role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            @endif

                                            <!-- Membuat link yang mengarah ke halaman detail tugas berdasarkan ID tugas -->
                                            <a href="{{ route('tasks.show', $task->id) }}"
                                                class="fw-bold lh-1 m-0 text-decoration-none text-{{ $task->priorityClass }} {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                {{ $task->name }}
                                            </a>
                                            <!-- Menampilkan nama tugas dengan tautan ke detail tugas dan warna teks sesuai prioritas -->
                                        </div>

                                        <small class="badge bg-{{ $task->priorityClass }} text-white px-2 py-1">
                                            {{ ucfirst($task->priority) }}
                                        </small>
                                        <!-- Menampilkan badge dengan warna yang sesuai dengan prioritas tugas -->
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <!-- Kolom untuk tombol aksi tugas seperti hapus dan lihat detail -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger p-1">
                                                <i class="bi bi-x-lg fs-7"></i>
                                            </button>
                                            <!-- Tombol untuk menghapus tugas -->
                                        </form>

                                        <a href="{{ route('tasks.show', $task->id) }}"
                                            class="btn btn-sm btn-outline-primary p-1">
                                            <i class="bi bi-eye fs-7"></i>
                                        </a>
                                        <!-- Tombol untuk melihat detail tugas -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- Body kartu tugas untuk menampilkan deskripsi tugas -->
                                <p class="card-text text-truncate">
                                    {{ $task->description }}
                                </p>
                            </div>

                            @if (!$task->is_completed)
                                <!-- Jika tugas belum selesai, tampilkan tombol untuk menandai tugas selesai -->
                                <div class="card-footer">
                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm btn-success w-100 d-flex align-items-center justify-content-center gap-2">
                                            <i class="bi bi-check-circle fs-5"></i>
                                            <span>Selesai</span>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                        <!-- Tombol untuk menambah tugas baru ke dalam list -->
                        <span class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-plus-lg fs-5"></i>
                            Add Task
                        </span>
                    </button>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <!-- Footer kartu yang menampilkan jumlah tugas dalam list -->
                    <p class="card-text"><i class="bi bi-check2-square me-2"></i>{{ $list->tasks->count() }} Tugas</p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
