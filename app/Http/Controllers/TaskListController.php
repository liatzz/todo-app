<?php
// Memulai eksekusi kode PHP dalam file.

namespace App\Http\Controllers;
// Menentukan bahwa ini adalah controller di dalam folder App\Http\Controllers.

use App\Models\TaskList;
// Mengimport model TaskList dari folder App\Models.
use Illuminate\Http\Request;
// Mengimport kelas Request dari namespace Illuminate\Http.

class TaskListController extends Controller
// TaskListController adalah controller dalam Laravel yang digunakan untuk mengelola daftar tugas (TaskList).
// extends Controller berarti mewarisi fitur dari Controller, seperti middleware, validasi, dan fungsi lainnya.
{
    public function index()
    {
        $lists = TaskList::all(); // Ambil semua data lists dari database
        return view('lists.index', compact('lists')); // Kirim ke view
    }
    public function store(Request $request) {
        // menyimpan daftar tugas baru
        $request->validate([
            // Validasi input
            'name' => 'required|max:100',
             // Nama tugas harus diisi dan tidak lebih dari 100 karakter.
        ]);
        // Membuat objek TaskList baru

        TaskList::create([
            // Membuat objek TaskList baru dengan atribut yang diisi dari input.
            'name' => $request->name,
            // nama tugas
        ]);
        // Mengembalikan pesan berhasil

        return redirect()->back();
        // Mengembalikan ke halaman sebelumnya.
    }

    public function destroy($id) {
        // Menghapus tugas dengan id tertentu
        TaskList::findOrFail($id)->delete();
        // Mengembalikan pesan berhasil

        return redirect()->back();
        // Mengembalikan ke halaman sebelumnya.
    }
}
// Akhir eksekusi kode PHP dalam file.
