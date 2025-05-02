<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cabang extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'nama_pekerja',
        'no_hp',
        'lokasi',
        'password',
        'status'
    ];
}
