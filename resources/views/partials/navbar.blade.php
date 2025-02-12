<!-- Navbar dengan Bootstrap: Gelap, latar belakang biru, dan tetap di atas (fixed-top) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container">
        <!-- Nama Brand/Aplikasi -->
        <a class="navbar-brand fw-bolder fs-3">
            <!-- Ikon dengan menggunakan Bootstrap Icons -->
            <i class="bi bi-check-circle-fill text-white"></i> 
            <!-- Nama aplikasi yang diambil dari konfigurasi Laravel -->
            {{ config('app.name') }}
        </a>
    </div>
</nav>
