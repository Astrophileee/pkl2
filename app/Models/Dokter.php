<?php

namespace App\Models;

use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_izin',
        'alamat',
    ];
    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
    

}
