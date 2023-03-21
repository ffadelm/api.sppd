<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
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
            'judul' => fake()->unique()->randomElement([
                'Analisis Faktor-faktor yang Mempengaruhi Kinerja Dosen dalam Proses Pembelajaran di Luar Kota',
                'Evaluasi Program Pelatihan Bagi Dosen untuk Meningkatkan Kualitas Pembelajaran di Luar Kota',
                'Efektivitas Pemanfaatan Teknologi Informasi dalam Proses Pembelajaran Dosen saat Melakukan Perjalanan Dinas',
                'Identifikasi Faktor-faktor yang Mempengaruhi Kinerja Dosen dalam Pelaksanaan Penelitian di Luar Kota',
                'Analisis Pelaksanaan Perjalanan Dinas Dalam Rangka Penyelenggaraan Kerjasama Antar Lembaga Pemerintah.'
            ]),
            'nomor_surat' => fake()->unique()->randomElement([
                '123/UMY/TI/2023',
                '456/UMY/TI/2023',
                '789/UMY/TI/2023',
                '101/UMY/TI/2023',
                '112/UMY/TI/2023',
            ]),
            'pemberi_perintah' => fake()->name(),
            'anggota_mengikuti' => [
                fake()->name(),
                fake()->name(),
                fake()->name(),
                fake()->name(),
            ],
            'lokasi_tujuan' => fake()->address(),
            'keterangan' => fake()->text(),
            'tgl_awal' => fake()->date(),
            'tgl_akhir' => fake()->date(),
            'diserahkan' => fake()->boolean(),
        ];
    }
}
