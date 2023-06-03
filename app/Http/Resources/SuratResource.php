<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuratResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'nidn' => $this->user->nidn,
                'jabatan' => $this->user->jabatan,
            ],
            'judul' => $this->judul,
            'nomor_surat' => $this->nomor_surat,
            'pemberi_perintah' => $this->pemberi_perintah,
            'anggota_mengikuti' => $this->anggota_mengikuti,
            'lokasi_tujuan' => $this->lokasi_tujuan,
            'keterangan' => $this->keterangan,
            'tgl_awal' => $this->tgl_awal,
            'tgl_akhir' => $this->tgl_akhir,
            'validasi' => $this->validasi,
            'diserahkan' => $this->diserahkan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
