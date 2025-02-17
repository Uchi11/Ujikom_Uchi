@extends('layouts.app')
<!-- Menggunakan layout utama 'app', ini memastikan halaman ini akan mengadopsi struktur layout yang sama dengan halaman lainnya -->

@section('content')
    <!-- Bagian ini akan diisi dengan konten yang spesifik untuk halaman ini, menggantikan bagian 'content' di layout utama -->

    <div class="container py-5 mt-5">
        <!-- Menggunakan kelas 'container' dari Bootstrap untuk membuat konten terstruktur dan responsif. Padding vertikal dan margin atas untuk memberi jarak pada halaman -->

        <!-- Judul Halaman -->
        <div class="text-center mb-5"> <!-- Bagian judul halaman, teks di tengah dengan margin bawah -->
            <h1 class="fw-bold text-primary display-4">About To-Do List</h1>
            <!-- Judul utama yang menggunakan teks tebal (fw-bold) dan warna utama (text-primary) dengan ukuran font besar (display-4) -->
            <p class="text-muted opacity-75 fs-4">Meningkatkan produktivitas Anda dengan mengelola tugas harian secara lebih
                efisien.</p>
            <!-- Paragraf subjudul yang menggunakan warna pudar (text-muted), transparansi (opacity-75), dan ukuran font sedang (fs-4) -->
        </div>

        <!-- Deskripsi Aplikasi -->
        <div class="row justify-content-center mb-5">
            <!-- Membuat baris dengan konten yang terpusat (justify-content-center) dan margin bawah -->
            <div class="col-md-10 col-lg-8">
                <!-- Menggunakan kolom responsif, lebar 10 kolom pada ukuran layar medium dan 8 kolom pada layar besar -->
                <div class="card border-0 shadow-lg p-5 rounded-4" style="background: #ffffff;">
                    <!-- Card tanpa border, dengan bayangan besar (shadow-lg), padding, dan sudut yang membulat (rounded-4), latar belakang putih -->
                    <div class="text-center mb-4"> <!-- Bagian konten di dalam card yang terpusat dengan margin bawah -->
                        <!-- Ikon dengan animasi dan bingkai -->
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light shadow-lg p-4"
                            style="width: 100px; height: 100px; transition: transform 0.3s ease;">
                            <!-- Ikon di dalam lingkaran dengan latar belakang terang dan bayangan besar, padding, dan animasi transisi -->
                            <i class="bi bi-mastodon text-primary fs-1"></i>
                            <!-- Ikon Mastodon dari Bootstrap Icons dengan warna utama (text-primary) dan ukuran besar (fs-1) -->
                        </div>
                    </div>

                    <h3 class="text-primary fw-semibold text-center mb-4">Apa itu Aplikasi To-Do List ?</h3>
                    <!-- Judul sub bagian dengan warna utama, font semi tebal (fw-semibold), dan teks terpusat -->
                    <p class="text-dark opacity-90 text-center">
                        <!-- Paragraf deskripsi dengan warna gelap dan sedikit transparansi, teks terpusat -->
                        Aplikasi TodoApp kami mempermudah Anda untuk mengelola tugas-tugas harian dengan cara yang praktis
                        dan efisien.
                        Dengan fitur sederhana, Anda dapat menambah, mengedit, menghapus, dan memprioritaskan tugas-tugas
                        Anda.
                        Semua dapat diakses dalam satu platform yang mudah digunakan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Fitur Unggulan Aplikasi -->
        <div class="row justify-content-center mb-5"> <!-- Baris dengan konten terpusat dan margin bawah -->
            <div class="col-md-10 col-lg-8"> <!-- Kolom responsif yang sama dengan sebelumnya -->
                <div class="card border-0 shadow-lg p-5 rounded-4" style="background: #f0f8ff;">
                    <!-- Card dengan latar belakang biru muda (#f0f8ff), bayangan besar, padding, dan sudut membulat -->
                    <h3 class="text-primary fw-semibold text-center mb-4">Fitur Unggulan</h3>
                    <!-- Judul fitur unggulan dengan warna utama dan teks terpusat -->
                    <ul class="list-unstyled text-dark opacity-90 fs-5">
                        <!-- Daftar fitur tanpa garis bawah, teks gelap, sedikit transparansi, dan ukuran font sedang -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Menambahkan Tugas Baru dengan Mudah</li>
                        <!-- Item daftar dengan ikon ceklis dan teks fitur -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Menandai Tugas yang Selesai</li>
                        <!-- Fitur lain dengan ikon ceklis -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Mengatur Prioritas Tugas</li>
                        <!-- Fitur lainnya -->
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Tugas Tersusun dengan Rapi dan Terorganisir
                        </li> <!-- Fitur terakhir dalam daftar -->
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pengembangan dan Pembaruan -->
        <div class="row justify-content-center mb-5"> <!-- Baris dengan konten terpusat dan margin bawah -->
            <div class="col-md-10 col-lg-8"> <!-- Kolom responsif -->
                <div class="card border-0 shadow-lg p-5 rounded-4" style="background: #e6f7ff;">
                    <!-- Card dengan latar belakang biru muda terang (#e6f7ff) -->
                    <h3 class="text-primary fw-semibold text-center mb-4">Pengembangan dan Pembaruan</h3>
                    <!-- Judul pengembangan dengan warna utama dan teks terpusat -->
                    <p class="text-dark opacity-90 text-center">
                        <!-- Paragraf deskripsi tentang pengembangan aplikasi dengan warna gelap dan sedikit transparansi -->
                        Aplikasi ini terus diperbarui dan dikembangkan untuk meningkatkan fungsionalitas dan pengalaman
                        pengguna.
                        Kami selalu berkomitmen untuk menghadirkan fitur baru yang berguna, sehingga Anda dapat tetap
                        produktif dengan cara yang lebih mudah.
                    </p>
                </div>
            </div>
        </div>

        <!-- Ajakan untuk Menggunakan Aplikasi -->
        <div class="row justify-content-center"> <!-- Baris dengan konten terpusat -->
            <div class="col-md-10 col-lg-8 text-center"> <!-- Kolom responsif dengan teks terpusat -->
                <a href="{{ route('tasks.index') }}"
                    class="btn btn-lg btn-outline-primary shadow-lg px-5 py-3 rounded-pill text-uppercase transition-all duration-300 ease-in-out"
                    role="button">Mulai Gunakan Sekarang</a>
                <!-- Tombol ajakan untuk menggunakan aplikasi dengan kelas untuk desain tombol besar, bayangan, padding, dan efek transisi -->
            </div>
        </div>
    </div>
@endsection <!-- Akhir dari blok 'content', menandakan akhir dari halaman ini -->
