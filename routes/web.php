<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
// Route GET /tasks/{task}/edit digunakan untuk menampilkan form edit.
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
// Route PUT /tasks/{task} digunakan untuk memproses pembaruan tugas.

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');

Route::resource('lists', TaskListController::class);
// Route resource digunakan untuk membuat beberapa route yang umum digunakan dalam aplikasi CRUD (Creat

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
// Route PATCH /tasks/{task}/complete digunakan untuk menandai tugas sebagai selesai
