<?php

namespace App\Models;

use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Pasien extends Model
{
    protected $fillable = [
        'nama_pasien',
        'jenis_kelamin',
        'alamat',
        'tgl_lahir',
        'no_tlp',
        'no_ktp',
    ];

    protected $casts = [
        'tgl_lahir' => 'datetime'
    ];

    use HasFactory;
    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
