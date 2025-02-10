<?php
// Memulai eksekusi kode PHP dalam file.

namespace App\Models;
// Menentukan namespace model ini di dalam direktori App\Models.

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Digunakan untuk membuat data dummy dengan Laravel Factories.
use Illuminate\Foundation\Auth\User as Authenticatable;
// Menggunakan model User dari Laravel.
use Illuminate\Notifications\Notifiable;
// Digunakan untuk mengirimkan notifikasi ke pengguna.

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    // Menggunakan trait HasFactory dan Notifiable.

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    // Menentukan kolom yang bisa diisi secara massal (create(), update()).
    // Kolom name, email, dan password bisa diisi langsung.    
    ];
    // Menentukan atribut yang bisa diisi secara massal.

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Menentukan atribut yang tidak boleh ditampilkan saat serialisasi.

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
        // Menentukan atribut yang harus dikastel.
    }
}
// Menggunakan model User dari Laravel.
