<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('judul');
            $table->string('nomor_surat');
            $table->string('pemberi_perintah');
            $table->text('anggota_mengikuti')->nullable();
            $table->text('lokasi_tujuan');
            $table->text('keterangan');
            $table->string('tgl_awal');
            $table->string('tgl_akhir');
            $table->boolean('validasi')->default(false); // false = belum divalidasi, true = sudah divalidasi
            $table->boolean('diserahkan')->default(false); // false = belum diserahkan, true = sudah diserahkan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
