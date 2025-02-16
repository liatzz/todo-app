@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(to right, #fce4ec, #f8bbd0); /* Latar belakang pink lembut */
            font-family: 'Poppins', sans-serif;
            color: #6a1b9a; /* Warna ungu lembut */
        }

        .card {
            border: 2px solid #f48fb1;
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-outline-primary {
            border-color: #d81b60;
            color: #d81b60;
            font-weight: bold;
        }

        .btn-outline-primary:hover {
            background-color: #d81b60;
            color: white;
        }

        .text-decoration-line-through {
            text-decoration: line-through;
            color: #b39ddb;
        }

        .butterfly-icon {
            width: 40px;
            height: 40px;
        }
    </style>

    <div id="content" class="container py-4">
        @if ($lists->count() == 0)
            <div class="text-center">
                <p class="fst-italic">Belum ada tugas yang ditambahkan 🦋</p>
                <button type="button" class="btn d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <img src="path/to/butterfly-icon.png" alt="Kupu-kupu" class="butterfly-icon">
                    <i class="bi bi-plus-square fs-1"></i>
                </button>
            </div>
        @endif

        <div class="d-flex flex-wrap gap-4 justify-content-center">
            @foreach ($lists as $list)
                <div class="card p-3" style="width: 20rem; background: rgba(255, 228, 225, 0.6);">
                    <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
                        <h4 class="card-title text-dark">🦋 {{ $list->name }}</h4>
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm text-danger p-0">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        @foreach ($list->tasks as $task)
                            <div class="card {{ $task->is_completed ? 'bg-light' : '' }} mb-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="fw-bold {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                        {{ $task->name }}
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger p-0">
                                            <i class="bi bi-x-circle fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-sm btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <i class="bi bi-plus"></i> 🎈 Tambah Tugas
                        </button>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <p class="m-0">❤️ {{ $list->tasks->count() }} Tugas ✨</p>
                    </div>
                </div>
            @endforeach

            @if ($lists->count() !== 0)
                <button type="button" class="btn btn-outline-primary w-10" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus"></i> 🎈 Tambah Daftar Baru
                </button>
            @endif
        </div>
    </div>
@endsection
