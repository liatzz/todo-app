<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Menyimpan password yang sedang digunakan oleh factory.
     * Ini bertujuan agar password yang di-hash tidak dibuat ulang setiap kali factory dipanggil.
     */
    protected static ?string $password;

    /**
     * Menentukan state default untuk model User.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Menghasilkan nama pengguna secara acak
            'email' => fake()->unique()->safeEmail(), // Menghasilkan email unik secara acak
            'email_verified_at' => now(), // Menetapkan waktu verifikasi email menjadi sekarang
            'password' => static::$password ??= Hash::make('password'), // Menggunakan password terenkripsi (default: "password")
            'remember_token' => Str::random(10), // Menghasilkan token acak untuk fitur "remember me"
        ];
    }

    /**
     * Menentukan bahwa email pengguna tidak diverifikasi.
     * Ini akan mengganti nilai `email_verified_at` menjadi null.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
