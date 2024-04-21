<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nrp';
    protected $keyType = 'string';

    protected $fillable = [
        'nrp',
        'name',
        'password',
        'email',
        'guid_role',
        'guid_kurikulum',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = ['role', 'kurikulum'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'guid_role', 'guid');
    }
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'guid_kurikulum', 'guid');
    }
    public function polling_details()
    {
        return $this->hasMany(PollingDetail::class, 'nrp_user', 'nrp');
    }
}
