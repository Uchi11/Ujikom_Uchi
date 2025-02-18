@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center min-vh-100 py-4 mt-5 mb-4">
        <div class="card border-0 shadow-lg p-4 card-custom fade-in" style="max-width: 600px;">
            <div class="text-center"> <!-- Menempatkan elemen di tengah secara horizontal -->
                <!-- Foto Profil -->
                <img src="{{ asset('img/foto.jpg') }}" alt="Avatar" class="rounded-circle shadow-lg"
                    style="width: 150px; height: 150px; object-fit: cover; border: 5px solid #007bff;">
                <!-- Gambar profil berbentuk lingkaran dengan bayangan besar (shadow-lg) dan border biru dengan ukuran 150px untuk lebar dan tinggi gambar, serta objek disesuaikan dengan crop -->

                <!-- Nama Pengguna dengan animasi -->
                <h2 class="fw-bold mt-3 text-dark name-animate">Uchi Muhammad Rizki</h2>

                <!-- Email Pengguna -->
                <p class="text-dark">uchimuhammadr@gmail.com</p>

                <!-- Kutipan atau motto -->
                <p class="fst-italic text-dark">"Hidup adalah perjalanan, nikmati setiap langkahnya."</p>
            </div>

            <!-- Informasi Lainnya -->
            <div class="mt-4 text-black slide-in-animate">
                <h4 class="fw-semibold text-center">About Me</h4>
                <p class="opacity-75 text-center">Halo! Saya Uchi Muhammad Rizki, Taruna Kelas XII RPL yang suka ngoding dan
                    eksplorasi teknologi. Saya tertarik pada Pengembangan Aplikasi Web dan aktif mengasah keterampilan lewat
                    berbagai proyek. Saat ini, saya belajar Laravel dan bercita-cita menjadi develope handal. Selain
                    ngoding, saya juga suka bermain game dan mendesain UI/UX. 🚀</p>
            </div>

            <!-- Progress Bar -->
            <div class="progress mb-3" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar progress-bar-custom" style="width: 14%;">PYTHON 8%</div>
            </div>

            <div class="progress mb-3" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar progress-bar-custom" style="width: 75%;">PHP 75%</div>
            </div>

            <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar progress-bar-custom" style="width: 35%;">JAVA SCRIPT 35%</div>
            </div>

            <div class="progress mb-4" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar progress-bar-custom" style="width: 85%;">HTML 85%</div>
            </div>

            <div class="w-auto mb-3 text-center">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary shadow-sm mx-auto btn-animate">
                    <i class="bi bi-arrow-left-short fs-5"></i>
                    <span class="fw-semibold fs-5">Back</span>
                </a>
            </div>
        </div>
    </div>
@endsection
