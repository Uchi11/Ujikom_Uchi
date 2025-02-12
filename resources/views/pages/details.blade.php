@extends('layouts.app')

@section('content')
    <div id="content" class="container mt-4">
        <!-- Tombol Kembali -->
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary fw-bold fs-5">
                <i class="bi bi-arrow-left-short"></i> Kembali
            </a>
        </div>

        <div class="row">
            <!-- Kolom Detail Task -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="fw-bold fs-4 text-truncate mb-0">{{ $task->name }}</h3>
                    </div>

                    <div class="card-body">
                        <p class="mb-0">{{ $task->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Kolom Aksi -->
            <div class="col-md-4 mt-3 mt-md-0">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <!-- Form Hapus Task -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-trash fs-5"></i> Hapus Tugas
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
