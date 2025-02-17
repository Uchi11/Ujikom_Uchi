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
                        <img src="{{ asset('img/foto.jpg') }}" alt="Avatar"
                            class="rounded-circle border border-3 border-primary" width="50" height="50">
                        <!-- Avatar profil -->
                        <h6 class="fw-bold mt-2 mb-0">Uching</h6> <!-- Nama pengguna -->
                        <small class="text-muted">uchimuhammadr@gmail.com</small> <!-- Email pengguna -->
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


<!-- CSS untuk Dropdown Profil -->
<style>
    /* Dropdown Profil */
    .dropdown-menu-custom {
        display: none;
        /* Awalnya disembunyikan */
        right: 0;
        min-width: 200px;
        /* Lebar minimum dropdown */
        opacity: 0;
        /* Opasitas diset ke 0 untuk efek transisi */
        transform: translateY(10px);
        /* Dropdown muncul dari bawah */
        transition: opacity 0.2s ease, transform 0.2s ease;
        /* Efek transisi untuk animasi */
        padding: 5px 0;
    }

    /* Header Profil di dalam dropdown */
    .profile-header {
        background: #f8f9fa;
        /* Warna latar belakang */
        border-top-left-radius: 8px;
        /* Radius pada sudut kiri atas */
        border-top-right-radius: 8px;
        /* Radius pada sudut kanan atas */
    }

    /* Menu item dalam dropdown */
    .dropdown-item-custom {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #333;
        /* Warna teks */
        text-decoration: none;
        /* Menghilangkan garis bawah */
        font-size: 14px;
        /* Ukuran font */
        cursor: pointer;
        /* Menampilkan cursor pointer ketika hover */
    }

    .dropdown-item-custom i {
        font-size: 16px;
        /* Ukuran ikon */
        color: #0d6efd;
        /* Warna ikon */
    }

    .dropdown-item-custom:hover {
        background-color: #f1f1f1;
        /* Warna latar belakang saat hover */
    }
</style>


<!-- JavaScript untuk Dropdown Profil -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const profileButton = document.getElementById("profileButton");
        const profileDropdown = document.getElementById("profileDropdown");

        // Dropdown Profil
        profileButton.addEventListener("click", function(event) {
            event.stopPropagation(); // Mencegah event bubbling
            profileDropdown.style.display = profileDropdown.style.display === "block" ? "none" :
                "block"; // Menampilkan/menyembunyikan dropdown
            profileDropdown.style.opacity = profileDropdown.style.display === "block" ? "1" :
                "0"; // Mengubah opasitas
            profileDropdown.style.transform = profileDropdown.style.display === "block" ?
                "translateY(0)" : "translateY(10px)"; // Menambahkan efek pergeseran
        });

        // Menutup dropdown saat klik di luar
        document.addEventListener("click", function() {
            profileDropdown.style.display = "none"; // Menyembunyikan dropdown
            profileDropdown.style.opacity = "0"; // Menghilangkan opasitas
            profileDropdown.style.transform = "translateY(10px)"; // Mengembalikan transformasi
        });
    });
</script>
