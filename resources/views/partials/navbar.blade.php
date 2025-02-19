{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(to right, #FFB6C1, #f10486, #FFB6C1); box-shadow: 0 4px 90px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Aplikasi -->
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.6rem; transition: 0.3s; letter-spacing: 1px;">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
        </button>

        <!-- Form Pencarian & Tambah Daftar -->
        <form action="{{ route('home') }}" method="GET" class="coquette-form d-flex align-items-center">
            <div class="search-group d-flex align-items-center">
                <input type="text" class="form-control coquette-input" name="query" id="searchQuery" placeholder="Cari tugas atau list..."
                    value="{{ request()->query('query') }}">
                <button type="submit" class="btn btn-coquette">Cari</button>
                <button type="button" class="btn btn-secondary" id="clearSearch">Clear</button>
                @if ($lists->count() !== 0)
                <button type="button" class="btn btn-outline-primary add-list-btn" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus"></i> 🎈 Tambah Daftar 🦋
                </button>
                @endif
            </div>
        </form>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="transition: 0.3s ease;">
                <div class="profile-avatar">
                    <img src="{{ asset('image/selia.jpg') }}" alt="Profil" class="rounded-circle" width="40" height="40">
                </div>
                <span class="fw-semibold ms-2">Selia Nur Sofian</span>
            </a>
        
            <!-- Tambahkan menu dropdown -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><a class="dropdown-item text-danger" href="#">Keluar</a></li>
            </ul>
        </div>
        <script>
            document.getElementById('clearSearch').addEventListener('click', function () {
                document.getElementById('searchQuery').value = ''; // Kosongkan input
                window.location.href = "{{ route('home') }}"; // Redirect ke halaman awal
            });
        </script>
    </div>
</nav>


{{-- Konten setelah navbar dengan padding-top --}}
<div style="padding-top: 100px;"> 
    <!-- Menambah padding-top untuk memberi ruang agar konten tidak tertutup navbar -->
</div>

<!-- Konten Anda di sini -->

<style>
    /* Styling untuk form pencarian agar lebih rapi */
    .coquette-form {
        background-color: #f1c4d3; /* Warna latar belakang pastel */
        border-radius: 12px;
        padding: 8px 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        width: 50%;
        display: flex;
        justify-content: center;
    }

    .search-group {
        background: rgb(237, 184, 228);
        border-radius: 10px;
        padding: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .coquette-input {
        border: none;
        border-radius: 8px;
        padding: 6px 10px;
        font-size: 0.9rem;
        width: 200px;
        outline: none;
    }

    .btn-coquette, .btn-secondary, .add-list-btn {
        border-radius: 150px;
        padding: 6px 14px;
        font-size: 0.85rem;
    }

    .btn-coquette {
        background-color: #ff61e5;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .btn-coquette:hover {
        background-color: #e772ba;
    }

    .btn-secondary {
        background-color: #dedede;
        color: #555;
    }

    .btn-secondary:hover {
        background-color: #c9c9c9;
    }

    .add-list-btn {
        border: 1px solid #fa8df3;
        color: #fa8df3;
        background: white;
        transition: 0.3s;
    }

    .add-list-btn:hover {
        background: #f49cda;
        color: white;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .coquette-form {
            flex-direction: column;
            align-items: stretch;
        }

        .search-group {
            flex-direction: column;
            width: 100%;
        }

        .coquette-input {
            width: 100%;
        }

        .btn-coquette, .btn-secondary, .add-list-btn {
            width: 100%;
        }
    }
</style>