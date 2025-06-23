<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;

class C_CabangEdukasi extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::all();
        return view('cabang.edukasi', compact('edukasis'));
    }
}
