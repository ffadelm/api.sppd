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
            'user_id' => mt_rand(1, 13),
            'judul' => fake()->unique()->randomElement([
                'Analisis Faktor-faktor yang Mempengaruhi Kinerja Dosen dalam Proses Pembelajaran di Luar Kota',
                'Evaluasi Program Pelatihan Bagi Dosen untuk Meningkatkan Kualitas Pembelajaran di Luar Kota',
                'Efektivitas Pemanfaatan Teknologi Informasi dalam Proses Pembelajaran Dosen saat Melakukan Perjalanan Dinas',
                'Identifikasi Faktor-faktor yang Mempengaruhi Kinerja Dosen dalam Pelaksanaan Penelitian di Luar Kota',
                'Analisis Pelaksanaan Perjalanan Dinas Dalam Rangka Penyelenggaraan Kerjasama Antar Lembaga Pemerintah.',
                'Penelitian Lapangan dalam Rangka Pengumpulan Data dan Observasi untuk Penelitian Ilmiah di Bidang Studi Lingkungan Hidup dan Konservasi Biodiversitas',
                'Partisipasi sebagai Pembicara Utama pada Seminar Nasional Mengenai Inovasi Pendidikan Berbasis Teknologi dan Model Pembelajaran Interaktif',
                'Kunjungan Industri dalam Rangka Studi Banding dan Pengembangan Kurikulum Program Studi Teknik Mesin dengan Fokus pada Implementasi Teknologi Produksi Terkini',
                'Workshop Peningkatan Kompetensi Pendidikan Agama Islam dengan Menggunakan Metode Pembelajaran Inovatif dan Pengembangan Materi Ajar Berbasis Karakter',
                'Pengabdian Masyarakat melalui Program Pelatihan dan Pendampingan Pemberdayaan Masyarakat di Desa-desa Terpencil dalam Bidang Kewirausahaan dan Manajemen Usaha Mikro',
                'Konferensi Internasional tentang Kajian Interdisipliner dalam Studi Hubungan Internasional dan Diplomasi untuk Membahas Isu-isu Global dalam Era Globalisasi',
                'Presentasi Makalah di Konferensi Regional tentang Riset Terapan dalam Bidang Ilmu Komputer dan Teknologi Informasi dengan Fokus pada Pengembangan Aplikasi Mobile dan Teknologi Cloud Computing',
                'Studi Banding ke Universitas Lain untuk Menggali Informasi dan Praktik Terbaik dalam Pengembangan Program Studi Teknik Elektro dengan Spesialisasi Sistem Kendali Otomatis dan Robotika'
            ]),
            'nomor_surat' => fake()->unique()->randomElement([
                '1/TI UMY/I/2023',
                '2/TI UMY/II/2023',
                '3/TI UMY/III/2023',
                '4/TI UMY/IV/2023',
                '5/TI UMY/V/2023',
                '6/TI UMY/I/2023',
                '7/TI UMY/II/2023',
                '8/TI UMY/III/2023',
                '9/TI UMY/IV/2023',
                '10/TI UMY/V/2023',
                '11/TI UMY/I/2023',
                '12/TI UMY/II/2023',
                '13/TI UMY/III/2023',

            ]),
            'pemberi_perintah' => fake()->name(),
            'anggota_mengikuti' => [
                fake()->name(),
                fake()->name(),
                fake()->name(),
                fake()->name(),
                fake()->name(),
            ],
            'lokasi_tujuan' => fake()->address(),
            'keterangan' => fake()->text(),
            'tgl_awal' => fake()->dateTimeBetween('-5 months', 'now')->format('Y-m-d'),
            'tgl_akhir' => fake()->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'validasi' => fake()->boolean(),
            'diserahkan' => fake()->boolean(),
        ];
    }
}
