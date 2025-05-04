<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use Illuminate\Http\Request;

class C_AdminLaporan extends Controller
{
    public function index()
    {
        $laporans = Laporan::with('cabang')->latest()->get();
        return view('admin.laporan', compact('laporans'));
    }

    public function show($id)
    {
        $laporan = Laporan::with('cabang')->findOrFail($id);
        return view('admin.detaillaporan', compact('laporan'));
    }

    // method untuk form
    public function feedbackForm($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.feedback', compact('laporan'));
    }

    // method untuk proses submit
    public function submitFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('admin.laporan')->with('success', 'Feedback berhasil dikirim.');
    }
}
