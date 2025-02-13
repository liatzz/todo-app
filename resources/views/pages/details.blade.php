@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(to right, #fce4ec, #f8bbd0);
            font-family: 'Poppins', sans-serif;
            color: #6a1b9a;
        }

        .card {
            border: 2px solid #f48fb1;
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: rgba(255, 228, 225, 0.8);
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

        .butterfly-icon {
            width: 40px;
            height: 40px;
        }
    </style>

    <div id="content" class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="btn btn-sm">
                <i class="bi bi-arrow-left-short fs-4"></i>
                <span class="fw-bold fs-5">Kembali</span>
            </a>
        </div>

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="row my-3">
            <div class="col-8">
                <div class="card p-3" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                            🦋 {{ $task->name }}
                            <span class="fs-6 fw-medium">di {{ $task->list->name }}</span>
                        </h3>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $task->description }}
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="fw-bold fs-4 text-truncate mb-0">🦋 Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        <h6 class="fs-6">
                            Prioritas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill">
                                {{ $task->priority }}
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        <select class="form-control" name="priority" id="priority">
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
