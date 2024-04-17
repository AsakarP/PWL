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
        'nrp_user', 'kode_mata_kuliah', 'guid_polling', 'nrp_user '
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
