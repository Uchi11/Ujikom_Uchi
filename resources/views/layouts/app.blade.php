<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Menentukan karakter encoding untuk dokumen -->
    <meta charset="UTF-8">

    <!-- Mengatur tampilan agar responsif di semua perangkat dengan skala awal 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Memastikan kompatibilitas dengan Internet Explorer versi lama -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Menampilkan judul halaman dinamis, berdasarkan variabel $title dan nama aplikasi dari konfigurasi -->
    <title>{{ $title }} - {{ config('app.name') }}</title>

    <!-- Mengimpor CSS dari Bootstrap untuk styling cepat dan konsisten -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Mengimpor ikon dari Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">

</head>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <!-- Menyertakan komponen navbar dari folder 'partials' -->
    @include('partials.navbar')

    <!-- Tempat untuk merender konten utama dari halaman yang menggunakan layout ini -->
    @yield('content')

    <!-- Menyertakan komponen modal dari folder 'partials' -->
    @include('partials.modal')

    <!-- Mengimpor file JavaScript khusus yang berisi logika interaktif -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Mengimpor JavaScript dari Bootstrap untuk fungsionalitas interaktif (misalnya, modal, dropdown) -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
