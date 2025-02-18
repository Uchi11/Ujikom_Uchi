// Menunggu seluruh konten halaman dimuat sebelum menjalankan script
document.addEventListener("DOMContentLoaded", () => {
    // Mengambil elemen dengan id 'content' untuk menyesuaikan padding-nya
    const content = document.getElementById("content");

    // Mengambil tinggi elemen dengan class 'navbar' untuk menghitung padding
    const navbarHeight = document.querySelector(".navbar").offsetHeight;

    // Menambahkan padding-top pada elemen 'content' agar tidak tertutup oleh navbar
    // Ditambah 16px sebagai jarak tambahan agar tampilannya lebih rapi
    content.style.paddingTop = `${navbarHeight + 16}px`;

    // Mengambil elemen modal dengan id 'addTaskModal'
    const addTaskModal = document.getElementById("addTaskModal");

    // Menambahkan event listener saat modal ditampilkan menggunakan Bootstrap (show.bs.modal)
    addTaskModal.addEventListener("show.bs.modal", (e) => {
        // Mengambil tombol yang memicu modal untuk mendapatkan data terkait
        const btn = e.relatedTarget;

        // Mengambil atribut data-list dari tombol yang ditekan
        const taskId = btn.getAttribute("data-list");

        // Mengatur nilai input tersembunyi (hidden input) dengan id 'taskListId' untuk menyimpan ID list tugas
        document.getElementById("taskListId").value = taskId;
    });

    const profileButton = document.getElementById("profileButton");
    const profileDropdown = document.getElementById("profileDropdown");

    // Dropdown Profil
    profileButton.addEventListener("click", function (event) {
        event.stopPropagation(); // Mencegah event bubbling
        profileDropdown.style.display =
            profileDropdown.style.display === "block" ? "none" : "block"; // Menampilkan/menyembunyikan dropdown
        profileDropdown.style.opacity =
            profileDropdown.style.display === "block" ? "1" : "0"; // Mengubah opasitas
        profileDropdown.style.transform =
            profileDropdown.style.display === "block"
                ? "translateY(0)"
                : "translateY(10px)"; // Menambahkan efek pergeseran
    });

    // Menutup dropdown saat klik di luar
    document.addEventListener("click", function () {
        profileDropdown.style.display = "none"; // Menyembunyikan dropdown
        profileDropdown.style.opacity = "0"; // Menghilangkan opasitas
        profileDropdown.style.transform = "translateY(10px)"; // Mengembalikan transformasi
    });
});
