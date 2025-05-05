<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use Illuminate\Http\Request;

class C_AdminHasilPanen extends Controller
{
    public function index()
    {
        $hasilPanens = HasilPanen::with('cabang')->latest()->get();
        return view('admin.hasilpanen', compact('hasilPanens'));
    }
}
