<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanResource extends JsonResource
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
            ],
            'surat_id' => [
                'id' => $this->surat->id,
                'judul' => $this->surat->judul,
                'nomor_surat' => $this->surat->nomor_surat,
                'tgl_awal' => $this->surat->tgl_awal,
                'tgl_akhir' => $this->surat->tgl_akhir,
                'tujuan' => $this->surat->lokasi_tujuan,
            ],
            'nama_kegiatan' => $this->nama_kegiatan,
            'foto' => $this->foto,
            'lokasi' => $this->lokasi,
            'deskripsi' => $this->deskripsi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
