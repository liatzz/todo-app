@extends('layouts.app')  <!-- Memanggil layout utama aplikasi -->

@section('content')  <!-- Menyisipkan konten di dalam bagian 'content' pada layout -->
<link rel="stylesheet" href="css/style.css">
    <div id="content" class="overflow-y-hidden overflow-x-hidden" 
         style="background: linear-gradient(to right, #ffe4e1, #f8bbd0); min-height: 100vh; padding: 20px;">
        
        <!-- Menampilkan pesan jika tidak ada daftar tugas yang ada -->
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="text-center fst-italic text-purple" style="font-size: 1.2rem;"> 🦋 Belum ada tugas yang ditambahkan? </p>
                <button type="button" class="btn d-flex align-items-center gap-2 bg-gradient shadow-lg" 
                        style="background: #ff61e5; color: white; border-radius: 20px; padding: 10px 20px;" 
                        data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-1"></i> <!-- Ikon untuk menambah daftar tugas -->
                </button>
            </div>
        @endif

        <!-- Menampilkan daftar tugas jika ada -->
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
            @foreach ($lists as $list)  <!-- Iterasi untuk setiap list -->
                <div class="card flex-shrink-0 shadow-lg" 
                     style="width: 18rem; max-height: 80vh; background: rgba(255, 228, 225, 0.9); border-radius: 15px;">
                     
                    <!-- Bagian header setiap list -->
                    <div class="card-header d-flex align-items-center justify-content-between shadow-sm" 
                         style="background: #f8bbd0; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        <h4 class="card-title text-purple">🦋 {{ $list->name }}</h4>
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>
                    
                    <!-- Menampilkan tugas di dalam setiap list -->
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($list->tasks as $task)
                            <div class="card border-0 shadow-sm {{ $task->is_completed ? 'bg-secondary-subtle' : 'bg-light' }}">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <a href="{{ route('tasks.show', $task->id) }}" 
                                       class="fw-bold lh-1 m-0 text-decoration-none {{ $task->is_completed ? 'text-decoration-line-through' : 'text-dark' }} ">
                                        {{ $task->name }}
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm p-0">
                                            <i class="bi bi-x-circle text-danger fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-truncate">{{ $task->description }}</p>
                                </div>
                            </div>
                        @endforeach
                        
                        <!-- Tombol untuk menambah tugas baru ke dalam list -->
                        <button type="button" class="btn btn-sm text-white shadow-lg" 
                                style="background: #ff61e5; border-radius: 20px; padding: 8px 15px;" 
                                data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <i class="bi bi-plus fs-5"></i> ❤️ Tambah Tugas 🦋
                        </button>
                    </div>
                        <!-- Menampilkan jumlah tugas di bagian bawah kartu -->
                        <div class="text-center mt-2 pt-2">
                            <span class="badge text-white px-3 py-2 rounded-pill" 
                                style="background: #ff61e5;">
                                Total Tugas: {{ $list->tasks->count() }}
                            </span>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
