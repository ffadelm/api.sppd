<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Titis Wisnu Wijaya, S. Pd., M. Pd',
                'Asep Setiawan S.Th.I., M.Ud.',
                'Laila Ma’rifatul Azizah, S.Kom., M.I.M.',
                'Chayadi Oktomy N S, S.T., M.Eng., Ph.D. (cand.)., ITILF',
                'Cahya Damarjati, S.T. M. Eng., Ph.D.',
                'Dr.(cand.) Ir. Etik Irijanti., S.T., M.Sc.',
                'Dr. Reza Giga Isnanda, S.T., M.Sc.',
                'Aprilia Kurnianti, ST. M. Eng.',
                'Asroni, Ir., S.T., M.Eng.',
                'Ir. Eko Prasetyo, M.Eng., Ph.D.',
                'Ir. Haris Setyawan, S.T., M.Eng.',
                'Dr. Ir. Dwijoko Purbohadi., M.T.',
                'Slamet Riyadi, S.T., M.Sc., Ph.D.',
            ]),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'nidn' => fake()->unique()->randomElement([
                '0506098902',
                '0516058701',
                '0509098901',
                '0516058702',
                '0516058703',
                '0516058704',
                '0516058705',
                '0516058706',
                '0516058707',
                '0516058708',
                '0516058709',
                '0516058710',
                '0516058711',
            ]),
            'jabatan' => fake()->randomElement([
                'Ketua Program Studi',
                'Sekretaris Program Studi',
                'Dosen',
                'Dosen',
                'Dosen',
                'Dosen',
                'Dosen',
                'Dosen',
                'Kepala Laboratorium',
                'Kepala Bagian',
                'Kepala Sub Bagian',
                'Kepala Seksi',
                'Kepala Sub Seksi'
            ]),
            'sebagai' => fake()->randomElement([
                'Panitia',
                'Peserta',
                'Penanggunng Jawab',
                'Pembicara',
            ]),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(13),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
