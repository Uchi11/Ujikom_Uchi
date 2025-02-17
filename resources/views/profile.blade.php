@extends('layouts.app')
<!-- Menggunakan layout utama 'app', ini memastikan halaman ini akan mengadopsi struktur layout yang sama dengan halaman lainnya -->

@section('content')
    <!-- Bagian ini akan diisi dengan konten yang spesifik untuk halaman ini, menggantikan bagian 'content' di layout utama -->

    <div class="container d-flex flex-column align-items-center min-vh-100 py-4 mt-5 mb-4">
        <!-- Container untuk menata halaman dengan flexbox, mengatur elemen secara vertikal dan pusat, tinggi minimal 100vh (viewport height) agar memenuhi layar, dan memberikan padding dan margin -->

        <div class="card border-0 shadow-lg p-4"
            style="max-width: 600px; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); border-radius: 15px;">
            <!-- Card dengan latar belakang transparan dan efek blur, border dihapus, dan sudut membulat (border-radius 15px) -->
            <div class="text-center"> <!-- Menempatkan elemen di tengah secara horizontal -->

                <!-- Foto Profil -->
                <img src="{{ asset('img/foto.jpg') }}" alt="Avatar" class="rounded-circle shadow-lg"
                    style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #007bff;">
                <!-- Gambar profil berbentuk lingkaran dengan bayangan besar (shadow-lg) dan border biru dengan ukuran 150px untuk lebar dan tinggi gambar, serta objek disesuaikan dengan crop -->
                <h2 class="fw-bold mt-3 text-dark">Uchi Muhammad Rizki</h2>
                <!-- Nama pengguna dengan teks tebal (fw-bold) dan margin atas (mt-3) -->
                <p class="text-dark">uchimuhammadr@gmail.com</p> <!-- Alamat email dengan warna gelap -->
                <p class="fst-italic text-dark">"Hidup adalah perjalanan, nikmati setiap langkahnya."</p>
                <!-- Kutipan atau motto dengan gaya huruf miring (fst-italic) dan warna gelap -->
            </div>

            <!-- Informasi Lainnya -->
            <div class="mt-4 text-black"> <!-- Menambahkan margin atas (mt-4) untuk pemisah dan teks berwarna hitam -->
                <h4 class="fw-semibold text-center">About Me</h4>
                <!-- Judul bagian "About Me" dengan font semi tebal (fw-semibold) dan teks terpusat -->
                <p class="opacity-75 text-center">Halo! Saya Uchi Muhammad Rizki, Taruna Kelas XII RPL yang suka ngoding dan
                    eksplorasi teknologi. Saya tertarik pada Pengembangan Aplikasi Web dan aktif mengasah keterampilan lewat
                    berbagai proyek. Saat ini, saya belajar Laravel dan bercita-cita menjadi develope handal. Selain
                    ngoding, saya juga suka bermain game dan mendesain UI/UX. 🚀</p>
                <!-- Deskripsi diri dengan transparansi 75% (opacity-75) dan teks terpusat -->
            </div>

            <!-- Progress Bar -->
            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                aria-valuemax="100">
                <!-- Progress bar untuk menunjukkan kemajuan dalam keterampilan Python, dengan tingkat progress 8% -->
                <div class="progress-bar bg-success" style="width: 14%;">PYTHON 8%</div>
                <!-- Bar progress dengan warna hijau dan label "PYTHON 8%" -->
            </div>

            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0"
                aria-valuemax="100"> <!-- Progress bar untuk PHP dengan progres 75% -->
                <div class="progress-bar bg-info text-dark" style="width: 75%;">PHP 75%</div>
                <!-- Bar progress dengan warna biru muda dan label "PHP 75%" -->
            </div>

            <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0"
                aria-valuemax="100"> <!-- Progress bar untuk JavaScript dengan progres 45% -->
                <div class="progress-bar bg-warning text-dark" style="width: 45%;">JAVA SCRIPT 45%</div>
                <!-- Bar progress dengan warna kuning dan label "JAVA SCRIPT 45%" -->
            </div>

            <div class="progress mb-4" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100"> <!-- Progress bar untuk HTML dengan progres 85% -->
                <div class="progress-bar bg-danger" style="width: 85%;">HTML 85%</div>
                <!-- Bar progress dengan warna merah dan label "HTML 85%" -->
            </div>

            <div class="w-auto mb-3 text-center">
                <!-- Kolom untuk tombol dengan lebar otomatis dan margin bawah, teks terpusat -->
                <a href="{{ route('home') }}" class="btn btn-outline-secondary shadow-sm mx-auto">
                    <!-- Tombol kembali ke halaman utama dengan kelas tombol outline dan bayangan kecil -->
                    <i class="bi bi-arrow-left-short fs-5"></i>
                    <!-- Ikon panah kiri kecil (arrow-left-short) dari Bootstrap Icons -->
                    <span class="fw-semibold fs-5">Kembali</span>
                    <!-- Teks "Kembali" dengan font semi tebal (fw-semibold) dan ukuran font sedikit besar (fs-5) -->
                </a>
            </div>
        </div>
    </div>
@endsection <!-- Akhir dari bagian 'content', menandakan akhir dari halaman ini -->
