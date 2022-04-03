<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;
use App\Models\Dokter;

class Bayar extends Model
{
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'pembayaran',
        'bayar',
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
