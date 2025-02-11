@extends('layouts.app')

@section('content')
    <style>
       body {
            background: linear-gradient(135deg, #F8BBD0, #B39DDB);
            color: #4A148C;
            overflow-x: hidden;
        }
        .card {
            padding: 15px;
            border-radius: 12px;
            overflow: hidden;
            border: none; /* Hapus border default */
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
            transition: transform 0.3s ease-in-out;
        }


        .card-body {
            padding: 15px;
        }

        .card {
            border: 2px solid transparent;
            border-image: linear-gradient(45deg, #B39DDB, #81D4FA);
            border-image-slice: 1;
        }



        .card:hover {
            transform: scale(1.05);
        }

        .card-header {
            padding: 15px;
            background: #F3E5F5; /* Ungu pastel */
            color: #4A148C;
            font-weight: bold;
        }

        .btn-outline-primary {
            
            border-color: #7E57C2;
            color: #7E57C2;
            transition: background 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: #7E57C2;
            color: white;
        }

        .btn-primary {
            background: #7E57C2;
            border: none;
        }

        .badge {
            border-radius: 20px;
            padding: 5px 10px;
        }

        .badge.text-bg-high {
            background: #E57373; /* Merah untuk high priority */
        }

        .badge.text-bg-medium {
            background: #FFD54F; /* Kuning untuk medium priority */
        }

        .badge.text-bg-low {
            background: #81C784; /* Hijau untuk low priority */
        }

        .butterfly {
            position: absolute;
            width: 50px;
            animation: float 4s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
    
    <div id="content" class="overflow-hidden px-3">
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center my-4">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                <button type="button" class="btn btn-outline-primary btn-lg">
                    <i class="bi bi-plus-square"></i> Tambah
                </button>
            </div>
        @endif

        <div class="d-flex gap-3 flex-nowrap overflow-x-auto" style="height: 90vh;">
            @foreach ($lists as $list)
                <div class="card flex-shrink-0 p-3" style="width: 20rem; max-height: 85vh;">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="card-title m-0">{{ $list->name }} 🦋</h5>
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash text-danger fs-5"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div class="card-body d-flex flex-column gap-2 overflow-auto" style="max-height: 60vh;">
                        @foreach ($tasks->where('list_id', $list->id) as $task)
                            <div class="task-card p-2 rounded shadow-sm border bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('tasks.show', $task->id) }}" class="fw-bold {{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                                            {{ $task->name }}
                                        </a>
                                        <span class="badge text-bg-{{ $task->priorityClass }}">{{ ucfirst($task->priority) }}</span>
                                    </div>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm p-0">
                                            <i class="bi bi-x-circle text-danger fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                                <p class="text-muted small m-0 text-truncate">{{ $task->description }}</p>
                                @if (!$task->is_completed)
                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary w-100 btn-sm">Selesai</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <p class="m-0">{{ $list->tasks->count() }} Tugas</p>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <i class="bi bi-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            @endforeach

            <button type="button" class="btn btn-outline-primary flex-shrink-0" style="width: 20rem; height: fit-content;" data-bs-toggle="modal" data-bs-target="#addListModal">
                <i class="bi bi-plus"></i> Tambah List
            </button>
        </div>
    </div>
@endsection
