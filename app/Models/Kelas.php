<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama', 'kode', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_user', 'kelas_id', 'user_id')->withTimestamps();
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'kelas_id');
    }
}