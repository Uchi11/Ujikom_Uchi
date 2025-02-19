<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Nama Aplikasi -->
        <a class="navbar-brand fw-bold fs-3 d-flex align-items-center">
            <!-- Ikon Mastodon -->
            <i class="bi bi-mastodon me-2 text-white"></i>
            {{ config('app.name') }} <!-- Nama aplikasi yang diambil dari konfigurasi app -->
        </a>

        <div class="d-flex align-items-center gap-3">
            <!-- Profil -->
            <div class="position-relative">
                <!-- Tombol Profil yang menampilkan gambar dan nama -->
                <button class="btn btn-outline-light d-flex align-items-center gap-2 rounded-pill px-3"
                    id="profileButton">
                    <img src="{{ asset('img/foto.jpg') }}" alt="Avatar" class="rounded-circle"
                        style="width: 35px; height: 35px; border: 2px solid white;"> <!-- Gambar profil -->
                    <span class="d-none d-md-inline fw-semibold">Uching</span> <!-- Nama pengguna -->
                </button>

                <!-- Dropdown Profil -->
                <div class="dropdown-menu-custom position-absolute bg-white shadow rounded py-2" id="profileDropdown">
                    <!-- Header Profil di dalam dropdown -->
                    <div class="profile-header text-center p-3">
                        <img src="{{ asset('img/foto.jpg') }}" alt="image"
                            class="rounded-circle border border-3 border-primary" width="50" height="50">
                        <!-- Avatar profil -->
                        <h6 class="fw-bold mt-2 mb-0">Uchi</h6> <!-- Nama pengguna -->
                        <small class="text-muted">XII Rekayasa Perangkat Lunak</small> <!-- Kelas dan jurusan pengguna -->
                    </div>
                    <hr class="dropdown-divider"> <!-- Pembatas horizontal di dropdown -->
                    <!-- Menu item untuk My Profile -->
                    <a href="{{ route('profile') }}" class="dropdown-item-custom d-flex align-items-center">
                        <i class="bi bi-person-circle me-2"></i> My Profile
                    </a>
                    <!-- Menu item untuk About To-Do List -->
                    <a href="{{ route('about') }}" class="dropdown-item-custom d-flex align-items-center">
                        <i class="bi bi-mastodon me-2"></i> About To-Do List
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
