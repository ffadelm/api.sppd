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
            'user_id' => mt_rand(1, 13),
            'surat_id' => mt_rand(1, 20),
            'nama_kegiatan' => fake()->randomElement([
                'Analisis Data Survei Kepuasan Pelanggan',
                'Evaluasi Implementasi Program Pendidikan Inklusif',
                'Penelitian Eksperimental tentang Efek Pupuk Organik pada Pertumbuhan Tanaman Padi',
                'Pemantauan Kualitas Udara di Area Perkotaan',
                'Pelatihan Keterampilan Komunikasi Efektif untuk Tim Penjualan',
                'Studi Kasus Implementasi Sistem Manajemen Mutu ISO 9001',
                'Pengembangan Aplikasi Mobile untuk Pelayanan Kesehatan Masyarakat',
                'Audit Keamanan Jaringan Komputer Perusahaan',
                'Evaluasi Dampak Program Bantuan Sosial bagi Masyarakat Miskin',
                'Analisis Kebutuhan Pelatihan Profesional untuk Tenaga Kerja Industri Kreatif',
                'Studi Literatur tentang Dampak Perubahan Iklim terhadap Ekosistem Laut',
                'Penyusunan Rencana Bisnis Startup Teknologi Berbasis AI',
                'Evaluasi Kinerja Proyek Konstruksi Gedung Pemerintah'
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
