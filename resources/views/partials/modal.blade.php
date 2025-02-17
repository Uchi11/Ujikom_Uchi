<!-- Modal Tambah List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <!-- Modal Dialog untuk mengatur lebar dan ukuran modal -->
    <div class="modal-dialog modal-md"> <!-- Ukuran modal diset menjadi medium -->

        <!-- Form untuk menambah list baru -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content border-0 rounded-4 overflow-hidden"
            style="backdrop-filter: blur(10px) saturate(180%); background: rgba(255, 255, 255, 0.12);">
            <!-- Token CSRF untuk melindungi dari serangan CSRF -->
            @csrf

            <!-- Bagian header modal (tombol dan judul modal) -->
            <div class="modal-header border-0 py-2" style="background: rgba(0, 123, 255, 0.6); color: white;">
                <h5 class="modal-title fw-bold" id="addListModalLabel">
                    <i class="bi bi-list-task me-2"></i> Tambah List
                </h5>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Bagian konten modal (input nama list) -->
            <div class="modal-body p-3">
                <div class="mb-3">
                    <!-- Label untuk input nama list -->
                    <label for="name" class="form-label fw-semibold text-white">Nama List</label>
                    <!-- Input teks untuk nama list -->
                    <input type="text" class="form-control p-2 rounded-3 shadow-sm border-0 text-white"
                        id="name" name="name" placeholder="Masukkan nama list..." required
                        style="background: rgba(255, 255, 255, 0.2); border: none;">
                </div>
            </div>

            <!-- Bagian footer modal (tombol Batal dan Tambah) -->
            <div class="modal-footer border-0 py-2" style="background: rgba(255, 255, 255, 0.15);">
                <!-- Tombol Batal untuk menutup modal -->
                <button type="button" class="btn btn-outline-light px-3 py-1 rounded-pill" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i> Batal
                </button>
                <!-- Tombol Tambah untuk menyimpan dan mengirim form -->
                <button type="submit" class="btn btn-light px-3 py-1 rounded-pill shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <!-- Modal Dialog untuk menampilkan form tambah tugas -->
    <div class="modal-dialog modal-md">

        <!-- Form untuk menambah tugas baru -->
        <form action="{{ route('tasks.store') }}" method="POST"
            class="modal-content border-0 rounded-4 overflow-hidden"
            style="backdrop-filter: blur(10px) saturate(180%); background: rgba(255, 255, 255, 0.12);">
            <!-- CSRF Token untuk melindungi dari serangan CSRF -->
            @csrf

            <!-- Bagian header modal (tombol dan judul modal) -->
            <div class="modal-header border-0 py-2" style="background: rgba(0, 123, 255, 0.6); color: white;">
                <h5 class="modal-title fw-bold" id="addTaskModalLabel">
                    <i class="bi bi-journal-plus me-2"></i> Tambah Tugas
                </h5>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Bagian konten modal (form input tugas baru) -->
            <div class="modal-body p-3">
                <!-- Input tersembunyi untuk ID list terkait dengan tugas -->
                <input type="hidden" id="taskListId" name="list_id">

                <!-- Input Nama Tugas -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-white">Nama Tugas</label>
                    <input type="text" class="form-control p-2 rounded-3 shadow-sm border-0 text-white"
                        id="name" name="name" placeholder="Masukkan nama tugas..." required
                        style="background: rgba(255, 255, 255, 0.2); border: none;">
                </div>

                <!-- Input Deskripsi Tugas -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold text-white">Deskripsi</label>
                    <textarea class="form-control p-2 rounded-3 shadow-sm border-0 text-white" name="description" id="description"
                        rows="3" placeholder="Masukkan deskripsi tugas..." required
                        style="background: rgba(255, 255, 255, 0.2); border: none;"></textarea>
                </div>

                <!-- Dropdown untuk memilih Prioritas Tugas -->
                <div class="mb-3">
                    <label for="priority" class="form-label fw-semibold text-white">Prioritas</label>
                    <select class="form-select p-2 rounded-3 shadow-sm border-0 text-black" name="priority"
                        id="priority" required style="background: rgba(255, 255, 255, 0.2); border: none;">
                        <option class="text-success" value="low">Low</option>
                        <option class="text-warning" value="medium">Medium</option>
                        <option class="text-danger" value="high">High</option>
                    </select>
                </div>
            </div>

            <!-- Bagian footer modal (tombol Batal dan Tambah) -->
            <div class="modal-footer border-0 py-2" style="background: rgba(255, 255, 255, 0.15);">
                <!-- Tombol Batal untuk menutup modal -->
                <button type="button" class="btn btn-outline-light px-3 py-1 rounded-pill" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i> Batal
                </button>
                <!-- Tombol Tambah untuk menyimpan dan menambah tugas -->
                <button type="submit" class="btn btn-light px-3 py-1 rounded-pill shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah
                </button>
            </div>
        </form>
    </div>
</div>
