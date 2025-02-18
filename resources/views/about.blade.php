@extends('layouts.app')

@section('content')
    <!-- Container utama untuk konten halaman About -->
    <div class="container py-5 mt-5">
        <!-- Bagian Judul dan Deskripsi -->
        <div class="text-center mb-5">
            <!-- Judul Halaman -->
            <h1 class="fw-bold text-primary display-4 text-animate">About To-Do List</h1>
            <!-- Deskripsi Halaman -->
            <p class="text-muted opacity-75 fs-4 text-animate">Meningkatkan produktivitas Anda dengan mengelola tugas harian
                secara lebih efisien.</p>
        </div>

        <!-- Bagian Konten Penjelasan tentang aplikasi -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col-lg-8">
                <!-- Card untuk penjelasan tentang aplikasi -->
                <div class="card border-0 shadow-lg p-5 rounded-4" style="background: #ffffff;">
                    <div class="text-center mb-4">
                        <!-- Icon yang menggambarkan aplikasi -->
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light shadow-lg p-4"
                            style="width: 100px; height: 100px; transition: transform 0.3s ease;">
                            <!-- Ikon Mastodon dengan animasi -->
                            <i class="bi bi-mastodon text-primary fs-1 bounce-animate"></i>
                        </div>
                    </div>

                    <!-- Judul penjelasan tentang aplikasi -->
                    <h3 class="text-primary fw-semibold text-center mb-4">Apa itu Aplikasi To-Do List ?</h3>
                    <!-- Deskripsi penjelasan aplikasi -->
                    <p class="text-dark opacity-90 text-center fade-in-animate">
                        Aplikasi TodoApp kami mempermudah Anda untuk mengelola tugas-tugas harian dengan cara yang praktis
                        dan efisien. Dengan fitur sederhana, Anda dapat menambah, mengedit, menghapus, dan memprioritaskan
                        tugas-tugas Anda. Semua dapat diakses dalam satu platform yang mudah digunakan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Bagian Fitur Unggulan Aplikasi -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col-lg-8">
                <!-- Card untuk fitur unggulan aplikasi -->
                <div class="card border-0 shadow-lg p-5 rounded-4" style="background: #f0f8ff;">
                    <!-- Judul Fitur Unggulan -->
                    <h3 class="text-primary fw-semibold text-center mb-4">Fitur Unggulan</h3>
                    <!-- Daftar fitur unggulan aplikasi -->
                    <ul class="list-unstyled text-dark opacity-90 fs-5 slide-in-animate">
                        <!-- Fitur 1: Menambahkan tugas baru -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Menambahkan Tugas Baru dengan Mudah</li>
                        <!-- Fitur 2: Menandai tugas yang selesai -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Menandai Tugas yang Selesai</li>
                        <!-- Fitur 3: Mengatur prioritas tugas -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Mengatur Prioritas Tugas</li>
                        <!-- Fitur 4: Menata tugas secara terorganisir -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Tugas Tersusun dengan Rapi dan Terorganisir
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bagian Button untuk mulai menggunakan aplikasi -->
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <!-- Tombol untuk menuju ke halaman utama aplikasi -->
                <!-- Membuat link yang mengarah ke halaman daftar semua tugas (index) berdasarkan rute 'tasks.index' -->
                <a href="{{ route('tasks.index') }}"
                    class="btn btn-lg btn-outline-primary shadow-lg px-5 py-3 rounded-pill text-uppercase transition-all duration-300 ease-in-out btn-animate"
                    role="button">
                    Mulai Gunakan Sekarang
                </a>
            </div>
        </div>
    </div>
@endsection
