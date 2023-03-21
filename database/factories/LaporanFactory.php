<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 5),
            'surat_id' => mt_rand(1, 5),
            'nama_kegiatan' => fake()->randomElement([
                'Analisis Faktor-faktor yang Mempengaruhi Kinerja Dosen dalam Proses Pembelajaran di Luar Kota',
                'Evaluasi Program Pelatihan Bagi Dosen untuk Meningkatkan Kualitas Pembelajaran di Luar Kota',
                'Efektivitas Pemanfaatan Teknologi Informasi dalam Proses Pembelajaran Dosen saat Melakukan Perjalanan Dinas',
                'Identifikasi Faktor-faktor yang Mempengaruhi Kinerja Dosen dalam Pelaksanaan Penelitian di Luar Kota',
                'Analisis Pelaksanaan Perjalanan Dinas Dalam Rangka Penyelenggaraan Kerjasama Antar Lembaga Pemerintah.'
            ]),
            'deskripsi' => fake()->text(),
            'foto' => [
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
            ],
            'lokasi' => fake()->address(),
        ];
    }
}
