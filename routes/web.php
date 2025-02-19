<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Route untuk halaman utama, menampilkan daftar tugas
Route::get('/', [TaskController::class, 'index'])->name('home');

// Resource controller untuk Task List (CRUD: index, create, store, show, edit, update, destroy)
Route::resource('lists', TaskListController::class);

// Resource controller untuk Task (CRUD: index, create, store, show, edit, update, destroy)
Route::resource('tasks', TaskController::class);

// Route untuk menandai task sebagai selesai
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Route untuk memindahkan task ke daftar lain
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');

// Route untuk toggle status selesai/tidak selesai
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleComplete'])->name('tasks.toggleComplete');
