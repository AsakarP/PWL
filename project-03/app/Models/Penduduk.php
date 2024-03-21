<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'tgl_lahir',
        'agama',
        'gol_darah',
        'kartu_keluarga_no',
    ];

    protected $primaryKey = 'nik';
}
