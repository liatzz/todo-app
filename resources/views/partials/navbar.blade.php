<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(to right, #FFB6C1, #f10486, #FFB6C1); box-shadow: 0 4px 90px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Aplikasi -->
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.6rem; transition: 0.3s; letter-spacing: 1px;">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Dropdown Profil -->
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> Profil
            </button>
            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Lihat Profil</a></li>
                <li><a class="dropdown-item" href="{{ route('settings') }}">Pengaturan</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Form Pencarian & Tambah Daftar -->
        <form action="{{ route('home') }}" method="GET" class="coquette-form d-flex align-items-center">
            <div class="search-group d-flex align-items-center">
                <input type="text" class="form-control coquette-input" name="query" id="searchQuery" placeholder="Cari tugas atau list..."
                    value="{{ request()->query('query') }}">
                <button type="submit" class="btn btn-coquette">Cari</button>
                <button type="button" class="btn btn-secondary" id="clearSearch">Clear</button>
                @if ($lists->count() !== 0)
                <button type="button" class="btn btn-outline-primary add-list-btn" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus"></i> 🎈 Tambah Daftar
                </button>
                @endif
            </div>
        </form>

        <script>
            document.getElementById('clearSearch').addEventListener('click', function () {
                document.getElementById('searchQuery').value = ''; // Kosongkan input
                window.location.href = "{{ route('home') }}"; // Redirect ke halaman awal
            });
        </script>
    </div>
</nav>
