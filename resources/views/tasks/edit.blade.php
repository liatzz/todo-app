@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="text-center">✏️ Edit Tugas</h2>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Tugas</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="priority" class="form-label">Prioritas</label>
                    <select class="form-control" id="priority" name="priority" required>
                        <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
