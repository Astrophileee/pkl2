<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'poli',
        'keluhan',
        'diagnosa',
        'obat',
    ];

    use HasFactory;
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
