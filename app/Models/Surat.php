<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'anggota_mengikuti' => 'array',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class)->cascadeDelete();
    }
}
