<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use Illuminate\Http\Request;

class C_HasilPanen extends Controller
{
    public function index()
    {
        $hasilPanens = HasilPanen::where('cabang_id', auth('cabang')->id())->latest()->get();
        return view('cabang.hasilpanen', compact('hasilPanens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode_panen' => 'required|string',
            'total_panen' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        HasilPanen::create([
            'cabang_id' => auth()->user()->id,
            'periode_panen' => $request->periode_panen,
            'total_panen' => $request->total_panen,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Laporan hasil panen berhasil ditambahkan.');
    }

}
