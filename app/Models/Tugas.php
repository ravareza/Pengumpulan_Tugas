<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = ['kelas_id', 'judul', 'deskripsi', 'deadline', 'nilai_maks', 'file_lampiran'];
    protected $casts = ['deadline' => 'datetime'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class, 'tugas_id');
    }
}