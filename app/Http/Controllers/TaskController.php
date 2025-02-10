<?php
// Memulai eksekusi kode PHP dalam file.

namespace App\Http\Controllers; 
// Menentukan bahwa ini adalah controller di dalam folder App\Http\Controllers.
use App\Models\Task;
// Mengimpor model Task, yang mewakili tabel tasks di database.
use App\Models\TaskList;
// Mengimpor model TaskList, yang mewakili daftar tugas.
use Illuminate\Http\Request;
// Memungkinkan penggunaan Request untuk menangani input dari form.

class TaskController extends Controller
// TaskController mewarisi kelas Controller, yang merupakan base controller di Laravel.
// Digunakan untuk mengelola operasi pada tabel tasks.
{
    public function index() {
        // Mengembalikan view index.blade.php, yang menampilkan daftar tugas.
        $data = [
            'title' => 'Home',
            // menampilkan semua tugas dan daftar tugas.
            'lists' => TaskList::all(),
            // Mengambil semua daftar tugas.
            'tasks' => Task::orderBy('created_at', 
            // Mengurutkan tugas berdasarkan tanggal pembuatan.
            'desc')->get(),
            // Mengambil semua tugas.
            'priorities' => Task::PRIORITIES
            // Menampilkan semua prioritas tugas.
        ];
        // Mengembalikan view index.blade.php dengan data yang telah diatur.

        return view('pages.home', $data);
        // Mengembalikan view pages.home.blade.php dengan data yang telah disiapkan.
    }
    // Fungsi index() digunakan untuk menampilkan daftar tugas.

    public function store(Request $request) {
        // Mengambil data dari form yang dikirimkan melalui request.
        $request->validate([
            // Validasi input
            'name' => 'required|max:100',
            // Nama tugas harus diisi dan tidak lebih dari 100 karakter.
            'description' => 'required|max:100',
            // Deskripsi tugas harus diisi dan tidak lebih dari 100 karakter.
            'priority' => 'required|in:low,medium,high',
            // Prioritas tugas harus diisi dan hanya dapat memilih dari low, medium, atau
            'list_id' => 'required'
            // ID daftar tugas harus diisi.
        ]);
        // Menyimpan tugas baru ke dalam database.

        Task::create([
            // Membuat tugas baru dengan data yang telah diisi.
            'name' => $request->name,
            // Nama tugas.
            'description' => $request->description,
            // Deskripsi tugas.
            'priority' => $request->priority,
            // Prioritas tugas.
            'list_id' => $request->list_id
            // ID daftar tugas.
        ]);
        // Mengembalikan pesan berhasil menyimpan tugas baru.


        return redirect()->back();
        // Mengembalikan ke halaman sebelumnya.
    }
    // Fungsi store() digunakan untuk menyimpan tugas baru.

    public function complete($id) {
        // Mengambil tugas dengan ID yang telah ditentukan.
        Task::findOrFail($id)->update([
            // Mengupdate tugas dengan ID yang telah ditentukan.
            'is_completed' => true
            // Menetapkan status tugas sebagai selesai.
        ]);
        // Mengembalikan pesan berhasil menyelesaikan tugas.

        return redirect()->back();
        // Mengembalikan ke halaman sebelumnya.
    }
    // Fungsi complete() digunakan untuk menyelesaikan tugas.

    public function destroy($id) {
        // Mengambil tugas dengan ID yang telah ditentukan.
        Task::findOrFail($id)->delete();
        // Menghapus tugas dengan ID yang telah ditentukan.

        return redirect()->back();
        // Mengembalikan ke halaman sebelumnya.
    }
    // Fungsi destroy() digunakan untuk menghapus tugas.

    public function show($id) {
        // Mengambil tugas dengan ID yang telah ditentukan.
        $task = Task::findOrFail($id);
        // Mengembalikan tugas dengan ID yang telah ditentukan.

        $data = [
            // Membuat array $data yang berisi informasi yang akan dikirim ke tampilan.
            'title' => 'Details',
            // Judul halaman.
            'task' => $task,
            // Tugas yang akan ditampilkan.
        ];
        // Mengembalikan tampilan detail tugas.

        return view('pages.details', $data);
        // Mengembalikan tampilan detail tugas.
    }
    // Fungsi show() digunakan untuk menampilkan detail tugas.
}
// Class TaskController berakhir.
