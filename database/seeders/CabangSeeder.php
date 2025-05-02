<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::create([
            'nama' => 'Cabang Rambipuji',
            'email' => 'pencaparrambipuji@lahantani.id',
            'nama_pekerja' => 'Almas',
            'no_hp' => '08123456789',
            'lokasi' => 'Rambipuji',
            'password' => Hash::make('cabang123'), // hashed
            'status' => true,
        ]);

        // Tambahan cabang kedua (optional)
        Cabang::create([
            'nama' => 'Cabang Patrang',
            'email' => 'pencaparpatrang@lahantani.id',
            'nama_pekerja' => 'Dini',
            'no_hp' => '08987654321',
            'lokasi' => 'Patrang',
            'password' => Hash::make('cabang123'), // hashed
            'status' => false, // belum aktif
        ]);
    }
}
