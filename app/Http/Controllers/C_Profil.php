<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class C_Profil extends Controller
{
    public function index(Request $request)
    {
        $nama = $request->nama;
        $cabang = Cabang::all()->makeHidden(['password']);
        $query = Cabang::query();
        if ($nama) {
            $query->where('nama', 'like', '%' . $nama . '%');
        }

        $cabang = $query->paginate(6); // pagination

        return view('admin.akuncabang', compact('cabang', 'nama'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:cabangs,email',
            'nama_pekerja' => 'required',
            'no_hp' => 'required',
            'lokasi' => 'required',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['status'] = $request->has('status');
        Cabang::create($validated);

        return redirect()->route('admin.akuncabang')->with('message', 'Cabang berhasil ditambahkan!');
    }

        public function editProfil()
    {
        return view('admin.editprofil', ['user' => auth()->user()]);
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        dd(get_class($user));
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect()->route('profil.edit')->with('message', 'Profil berhasil diperbarui!');
    }

}
