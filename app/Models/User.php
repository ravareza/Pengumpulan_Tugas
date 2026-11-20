<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isGuru(): bool
    {
        return $this->role === 'guru';
    }

    public function kelasDiajar()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }

    public function kelasDiikuti()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_user', 'user_id', 'kelas_id')->withTimestamps();
    }

    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class, 'siswa_id');
    }
}
