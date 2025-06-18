<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKunjungan;
use Illuminate\Support\Facades\Log;

class C_CabangJadwalKunjungan extends Controller
{
    public function index()
    {
        if (auth('cabang')->user()->status != 1) {
            return redirect()->route('cabang.profil')->with('error', 'Akun Anda belum aktif. Silakan aktifkan terlebih dahulu di halaman profil.');
        }

        return view('cabang.jadwalkunjungan');
    }

    public function events()
    {
        try {
            // Debug: Cek auth cabang
            $cabangId = auth('cabang')->id();
            Log::info('Cabang ID: ' . $cabangId);

            // Debug: Cek data mentah dari database
            $rawData = JadwalKunjungan::where('cabang_id', $cabangId)->get();
            Log::info('Raw data count: ' . $rawData->count());
            Log::info('Raw data: ' . $rawData->toJson());

            $events = JadwalKunjungan::where('cabang_id', $cabangId)
                ->get()
                ->map(function ($item) {
                    // Debug: Cek setiap item
                    Log::info('Processing item ID: ' . $item->id);
                    Log::info('Item data: ' . json_encode($item->toArray()));

                    return [
                        'title' => $item->tujuan,
                        'start' => $item->tanggal . 'T' . $item->jam_mulai,
                        'end' => $item->tanggal . 'T' . $item->jam_selesai,
                        'description' => $item->tujuan,
                    ];
                });

            Log::info('Final events: ' . $events->toJson());

            return response()->json($events);

        } catch (\Exception $e) {
            Log::error('Error in events method: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
