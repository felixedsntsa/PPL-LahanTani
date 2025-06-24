<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;

class C_CabangEdukasi extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::simplePaginate(3);
        return view('cabang.edukasi', compact('edukasis'));
    }

    public function show($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        return view('cabang.detailedukasi', compact('edukasi'));
    }
}
