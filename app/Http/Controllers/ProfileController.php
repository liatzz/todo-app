<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Contoh data user (bisa diambil dari database nanti)
        $user = [
            'name' => 'Liatzz',
            'email' => 'liatzz@example.com',
            'bio' => 'Developer Laravel & PHP Enthusiast',
            'profile_picture' => 'https://via.placeholder.com/150'
        ];

        return view('profile', compact('user')); // Kirim variabel ke view
    }
}
