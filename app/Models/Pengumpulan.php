<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';
    protected $fillable = ['tugas_id', 'siswa_id', 'file_path', 'catatan', 'nilai', 'feedback', 'dinilai_at'];
    protected $casts = ['dinilai_at' => 'datetime'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function terlambat(): bool
    {
        return $this->created_at->gt($this->tugas->deadline);
    }
}