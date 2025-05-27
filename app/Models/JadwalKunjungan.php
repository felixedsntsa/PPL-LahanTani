<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKunjungan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kunjungan';
    protected $fillable = ['cabang_id', 'tanggal', 'jam_mulai', 'jam_selesai', 'tujuan'];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
}
