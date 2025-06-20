<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class C_Register extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:cabangs',
            'nama_pekerja' => 'required|string|max:100',
            'no_hp' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cabang = Cabang::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nama_pekerja' => $request->nama_pekerja,
            'no_hp' => $request->no_hp,
            'lokasi' => $request->lokasi,
            'password' => Hash::make($request->password),
            'status' => false, 
        ]);


        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login dengan akun Anda.');
    }
}
