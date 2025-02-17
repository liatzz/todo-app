<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar tugas dan daftar kategori tugas.
     * Bisa menampilkan hasil pencarian jika ada query yang diberikan.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Cari tugas berdasarkan nama atau deskripsi
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest()
                ->get();

            // Cari daftar tugas yang mengandung tugas yang sesuai dengan query
            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks')
                ->get();

            // Jika tidak ada tugas yang ditemukan, tetap muat daftar tugas
            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                // Filter daftar tugas berdasarkan hasil pencarian
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            // Jika tidak ada pencarian, tampilkan semua tugas dan daftar
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        // Kirim data ke tampilan halaman utama
        return view('pages.home', [
            'title' => 'Home',
            'lists' => $lists,
            'tasks' => $tasks,
            'priorities' => Task::PRIORITIES
        ]);
    }

    /**
     * Mengubah status penyelesaian tugas (toggle completed).
     */
    public function toggleComplete(Task $task)
    {
        // Ubah status tugas (jika belum selesai, jadi selesai; jika sudah selesai, jadi belum selesai)
        $task->is_completed = !$task->is_completed;
        $task->save();
    
        return redirect()->back()->with('success', 'Status tugas berhasil diperbarui!');
    }
    
    /**
     * Menyimpan tugas baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
            'list_id' => 'required'
        ]);

        // Simpan tugas baru
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);

        return redirect()->back();
    }

    /**
     * Menandai tugas sebagai selesai.
     */
    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    /**
     * Menghapus tugas berdasarkan ID.
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('home');
    }

    /**
     * Menampilkan detail dari tugas tertentu.
     */
    public function show($id)
    {
        return view('pages.details', [
            'title' => 'Task',
            'lists' => TaskList::all(),
            'task' => Task::findOrFail($id),
        ]);
    }

    /**
     * Memindahkan tugas ke daftar lain.
     */
    public function changeList(Request $request, Task $task)
    {
        // Validasi apakah daftar yang dipilih valid
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        // Update daftar tugas
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    /**
     * Memperbarui informasi tugas.
     */
    public function update(Request $request, Task $task)
    {
        // Validasi input
        $request->validate([
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        // Update data tugas
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
