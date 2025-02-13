{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(to right, #FFB6C1, #f10486, #FFB6C1); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Aplikasi -->
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.5rem; transition: 0.3s;">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Form Pencarian -->
        <form action="{{ route('home') }}" method="GET" class="d-flex ms-auto gap-5">
            <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..." value="{{ request()->query('query') }}">
            <button type="submit" class="btn btn-outline-primary">🔍 Cari</button>
        </form>
    </div>
</nav>

{{-- Konten setelah navbar dengan padding-top --}}
<div style="padding-top: 80px;">  <!-- Menambah padding-top untuk memberi ruang agar konten tidak tertutup navbar -->
    <!-- Konten Anda di sini -->
</div>
