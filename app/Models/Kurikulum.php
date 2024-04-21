<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Kurikulum extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'guid';
    protected $keyType = 'string';


    protected $fillable = [
        'tahun_akademik'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function mata_kuliahs()
    {
        return $this->hasMany(MataKuliah::class, 'guid_kurikulum', 'guid');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'guid_kurikulum', 'guid');
    }
}
