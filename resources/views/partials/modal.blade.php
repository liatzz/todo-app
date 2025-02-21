<!-- Modal untuk menambahkan List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Tidak perlu ditambahkan karena form method default sudah POST -->
            @csrf <!-- Token CSRF untuk keamanan -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list" required> <!-- Tambahkan 'required' untuk validasi -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk menambahkan Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Tidak perlu karena default sudah POST -->
            @csrf <!-- Token CSRF untuk keamanan -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="taskListId" name="list_id"> <!-- ID List, diset dari JavaScript -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama task" required> <!-- Tambahkan 'required' -->
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" rows="3"
                        placeholder="Masukkan deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Prioritas</label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option> <!-- Default ke low, medium, high -->
                        <option value="high">High</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
