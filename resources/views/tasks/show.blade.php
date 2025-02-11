@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(135deg, #6A11CB, #2575FC);
            color: white;
        }

        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            background: #fff;
            color: #333;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
        }

        .badge {
            font-size: 14px;
            border-radius: 20px;
            padding: 8px 12px;
            font-weight: bold;
        }

        .badge.priority-high {
            background: #E57373;
            color: white;
        }

        .badge.priority-medium {
            background: #FFD54F;
            color: black;
        }

        .badge.priority-low {
            background: #81C784;
            color: black;
        }

        .status-badge {
            transition: all 0.3s ease-in-out;
        }

        .status-badge:hover {
            transform: scale(1.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF6FD8, #3813C2);
            border: none;
            transition: background 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #3813C2, #FF6FD8);
        }

        .btn-danger {
            background: linear-gradient(135deg, #FF6F61, #D32F2F);
            border: none;
            transition: background 0.3s ease-in-out;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #D32F2F, #FF6F61);
        }
    </style>

    <div id="content" class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card p-4" style="max-width: 800px; width: 100%;">
            <h2 class="mb-3 text-center">📌 Detail Tugas</h2>

            <div class="row">
                <div class="col-md-8">
                    <h3 class="mb-2">{{ $task->name }}</h3>
                    <p class="text-muted">{{ $task->description }}</p>
                </div>

                <div class="col-md-4 text-end">
                    <span class="badge priority-{{ strtolower($task->priority) }} badge-pill">
                        {{ ucfirst($task->priority) }}
                    </span>
                    <span class="badge status-badge text-bg-{{ $task->status ? 'success' : 'danger' }} badge-pill">
                        {{ $task->status ? 'Selesai' : 'Belum Selesai' }}
                    </span>
                </div>
            </div>

            <div class="text-center mt-4">
                
                <!-- Tombol Edit -->
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Edit Tugas
                </a>                
                
                    <i class="bi bi-pencil-square"></i> Edit Tugas
                </a>

                <!-- Tombol Hapus -->
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
