<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode';
    protected $keyType = 'string';


    protected $fillable = [
        'kode', 'nama', 'sks', 'guid_kurikulum'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'guid_kurikulum', 'guid');
    }
}
