{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(to right, #FFB6C1, #f10486, #FFB6C1); box-shadow: 0 4px 90px rgba(0, 0, 0, 0.1); z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo Aplikasi -->
        <a class="navbar-brand fw-bolder" href="#home" style="font-size: 1.5rem; transition: 0.3s;">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Form Pencarian -->
        <form action="{{ route('home') }}" method="GET" class="d-flex gap-3 coquette-form">
            <input type="text" class="form-control coquette-input" name="query" id="searchQuery" placeholder="Cari tugas atau list..."
                value="{{ request()->query('query') }}">
            <button type="submit" class="btn btn-coquette">Cari</button>
            <button type="button" class="btn btn-secondary" id="clearSearch">Clear</button>
        </form>
        
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
        .coquette-form {
    background-color: #eda2c5; /* Warna latar belakang pastel */
    border-radius: 10px; /* Sudut yang lebih bulat */
    padding: 10px; /* Ruang di dalam form */
    box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1); /* Bayangan halus */
}

.coquette-input {
    border: 2px solid #ff6f61; /* Warna border yang cerah */
    border-radius: 10px; /* Sudut input yang lebih bulat */
    padding: 5px; /* Ruang di dalam input */
    transition: border-color 0.3s; /* Transisi halus saat hover */
    margin-right: 5px; /* Sesuaikan jaraknya */
}

.coquette-input:focus {
    border-color: #e66e94; /* Warna border saat fokus */
    outline: none; /* Menghilangkan outline default */
}

.btn-coquette {
    background-color: #ff61e5; /* Warna latar belakang tombol */
    color: rgb(253, 252, 252); /* Warna teks tombol */
    border-radius: 10px; /* Sudut tombol yang lebih bulat */
    transition: background-color 0.3s; /* Transisi halus saat hover */
}

.btn-coquette:hover {
    background-color: #e772ba; /* Warna latar belakang saat hover */
}
</style>
