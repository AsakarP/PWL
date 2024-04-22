<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
        'mulai_polling',
        'akhir_polling'
    ];
}
