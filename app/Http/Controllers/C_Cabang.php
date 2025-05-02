<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class C_Cabang extends Controller
{
    public function show($id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('admin.detailcabang', compact('cabang'));
    }


}
