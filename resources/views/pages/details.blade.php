@extends('layouts.app')
{{-- Kode ini menunjukkan bahwa halaman ini menggunakan template layout yang berada di file layouts/app.blade.php. Dengan ini, tampilan halaman akan mengikuti struktur utama yang ada di layout tersebut. --}}
@section('content')
{{-- Bagian ini mendefinisikan konten utama dari halaman ini yang akan dimasukkan ke dalam @yield('content') di layout app.blade.php. --}}
    <div id="content" class="row">
        {{-- Elemen <div> ini digunakan sebagai wadah utama dengan ID content dan class row untuk membentuk layout berbasis grid menggunakan Bootstrap. --}}
        <h1 class="mb-3">Halaman Details</h1>
        {{-- Menampilkan judul halaman "Halaman Details".
        class="mb-3" memberikan margin bawah agar ada jarak antara judul dan elemen berikutnya. --}}
        <div class="row">
            <div class="col-8">
            {{-- Menggunakan Bootstrap Grid dengan 2 kolom:
            col-8 → Kolom utama dengan lebar 8 dari 12 bagian.
            col-4 → Kolom samping dengan lebar 4 dari 12 bagian. --}}
                <h3 class="mb-2">{{ $task->name }}</h3>
                <p class="text-muted">{{ $task->description }}</p>
                {{-- Menampilkan nama tugas ($task->name) dengan ukuran heading <h3>.
                Menampilkan deskripsi tugas ($task->description) dalam elemen paragraf <p> dengan teks berwarna abu-abu (text-muted). --}}
            </div>
            {{-- div adalah elemen container (wadah) --}}
            <div class="col-4">
            {{-- col-4 berarti kolom ini mengambil 4 bagian dari total 12 bagian pada grid Bootstrap.
            Dalam satu baris (row), Bootstrap membagi layout menjadi 12 bagian. --}}
                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                    {{ $task->priority }}
                </span>
                {{-- Menampilkan prioritas tugas dengan badge Bootstrap.
                Warna badge diambil dari {{ $task->priorityClass }} yang kemungkinan didefinisikan berdasarkan tingkat prioritas (low, medium, high). --}}
                <span class="badge text-bg-{{ $task->status ? 'success' : 'danger' }} badge-pill"
                    style="width: fit-content">
                    {{ $task->status ? 'Selesai' : 'Belum Selesai' }}
                </span>
                {{-- Menampilkan status tugas (Selesai atau Belum Selesai) dalam bentuk badge Bootstrap.
                {{ $task->status ? 'success' : 'danger' }}:
                Jika $task->status true → badge hijau (success) dengan teks "Selesai".
                Jika $task->status false → badge merah (danger) dengan teks "Belum Selesai". --}}
            </div>
        </div>
    </div>
    {{-- Ini adalah tag penutup untuk <div class="row">, yang sebelumnya dibuka dalam kode.
    Menutup container yang membungkus dua kolom (col-8 dan col-4). --}}
@endsection
{{-- Menutup bagian konten yang sebelumnya dimulai dengan @section('content').
Digunakan dalam Blade Template Laravel untuk menandakan akhir dari bagian yang didefinisikan di dalam @section. --}}