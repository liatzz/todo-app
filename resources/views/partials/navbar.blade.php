{{-- (nav) Elemen HTML yang digunakan untuk navigasi. --}}
{{-- (navbar) Kelas Bootstrap untuk mendefinisikan navbar. --}}
{{-- (navbar-expand-lg) Navbar akan tetap dalam mode collapsed (tertutup) pada layar kecil dan diperluas di layar besar. --}}
<nav class="navbar navbar-expand-lg 
{{-- navbar-dark: Menyesuaikan warna teks agar cocok dengan background gelap. --}}
{{-- fixed-top: Navbar akan selalu tetap berada di atas layar meskipun pengguna menggulir halaman. --}}
{{-- Memberikan efek gradasi warna dari pink muda ke magenta, lalu kembali ke pink muda. --}}
navbar-dark fixed-top" style="background: 
linear-gradient(to right, #FFB6C1, #f10486, #FFB6C1);">
{{-- container: Kelas Bootstrap yang mengatur padding dan lebar konten agar responsif. --}}
{{-- d-flex: Menggunakan Flexbox untuk tata letak yang lebih fleksibel. --}}
{{-- justify-content-center: Memusatkan elemen di dalamnya rata kanan:. --}}
    <div class="container d-flex justify-content-right">
        <!-- Logo Aplikasi -->
        {{-- <a>: Elemen hyperlink yang mengarah ke halaman utama (href="#"). --}}
        {{-- navbar-brand: Kelas Bootstrap untuk elemen logo atau brand aplikasi. --}}
        {{-- fw-bolder: Membuat teks lebih tebal. --}}
        <a class="navbar-brand fw-bolder" href="#">
            {{-- Dalam Laravel, ini mengambil nama aplikasi dari file konfigurasi (config/app.php), biasanya diambil dari .env dengan APP_NAME=NamaAplikasi. --}}
            {{ config('app.name') }}
        </a>
    </div>
</nav>

<!-- Tambahkan padding untuk memberi ruang di bawah navbar -->
<div style="padding-top: 5px;">
    <!-- Konten Anda di sini -->
</div>