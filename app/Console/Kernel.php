<?php

namespace App\Console;

use App\Models\Surat;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    // }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Mendapatkan tanggal saat ini
            $today = now();

            // Mendapatkan surat-surat yang sudah lebih dari 4 tahun
            $surat = Surat::whereDate('created_at', '<=', $today->subYears(4))->get();

            // Menghapus surat-surat yang sudah lebih dari 4 tahun
            $surat->each(function ($surat) {
                $surat->delete();
            });
        })->daily();
    }
}
