<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Models\JadwalKunjungan;

class C_AdminJadwalKunjungan extends Controller
{
    public function index()
    {
        $cabangs = Cabang::all();
        return view('admin.jadwalkunjungan', compact('cabangs'));
    }

    public function events()
    {
        $events = JadwalKunjungan::with('cabang')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->cabang->nama,
                'start' => $item->tanggal . 'T' . $item->jam_mulai,
                'end' => $item->tanggal . 'T' . $item->jam_selesai,
                'description' => $item->tujuan,
                'cabang_nama' => $item->cabang->nama,
                'cal_title' => 'Berkunjung ke ' . $item->cabang->nama
            ];
        });

        return response()->json($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'tujuan' => 'required|string',
        ]);

        JadwalKunjungan::create($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalKunjungan::with('cabang')->findOrFail($id);
        return response()->json($jadwal);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'tujuan' => 'required|string',
        ]);

        $jadwal = JadwalKunjungan::findOrFail($id);
        $jadwal->update([
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'tujuan' => $request->tujuan,
        ]);

        return response()->json(['message' => 'Jadwal berhasil diperbarui']);
    }
}
