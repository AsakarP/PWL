<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class PollingDetail extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'guid';
    protected $keyType = 'string';


    protected $fillable = [
        'nrp_user', 'kode_mata_kuliah', 'guid_polling'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mata_kuliah', 'kode');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nrp_user', 'nrp');
    }
    public function polling()
    {
        return $this->belongsTo(MataKuliah::class, 'guid_polling', 'guid');
    }
}
