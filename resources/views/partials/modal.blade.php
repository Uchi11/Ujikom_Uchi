<!-- Modal Add List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <!-- Modal Bootstrap untuk menambahkan List baru -->
    <div class="modal-dialog">
        <!-- Form untuk menyimpan list baru -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content rounded-3 shadow-lg">
            @method('POST') <!-- Menentukan metode HTTP POST -->
            @csrf <!-- Token untuk melindungi dari serangan CSRF -->

            <!-- Header Modal -->
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Tombol untuk menutup modal -->
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama List</label> <!-- Label untuk input nama list -->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list" required> <!-- Input nama list -->
                </div>
            </div>

            <!-- Footer Modal dengan tombol aksi -->
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk membatalkan -->
                <button type="submit" class="btn btn-primary">Tambah</button> <!-- Tombol untuk submit form -->
            </div>
        </form>
    </div>
</div>

<!-- Modal Add Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <!-- Modal Bootstrap untuk menambahkan Task baru -->
    <div class="modal-dialog">
        <!-- Form untuk menyimpan task baru -->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content rounded-3 shadow-lg">
            @method('POST') <!-- Menentukan metode HTTP POST -->
            @csrf <!-- Token untuk melindungi dari serangan CSRF -->

            <!-- Header Modal -->
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Tombol untuk menutup modal -->
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Input tersembunyi untuk menyimpan ID List yang terkait dengan task -->
                <input type="text" id="taskListId" name="list_id" hidden>

                <!-- Input untuk nama task -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Task</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama task" required>
                </div>

                <!-- Textarea untuk deskripsi task -->
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi task" rows="3"
                        required></textarea>
                </div>

                <!-- Dropdown untuk memilih prioritas task -->
                <div class="mb-3">
                    <label for="priority" class="form-label">Prioritas</label>
                    <select class="form-select" id="priority" name="priority" required>
                        <option value="low">Low</option> <!-- Prioritas rendah -->
                        <option value="medium">Medium</option> <!-- Prioritas sedang -->
                        <option value="high">High</option> <!-- Prioritas tinggi -->
                    </select>
                </div>
            </div>

            <!-- Footer Modal dengan tombol aksi -->
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk membatalkan -->
                <button type="submit" class="btn btn-primary">Tambah</button> <!-- Tombol untuk submit form -->
            </div>
        </form>
    </div>
</div>
