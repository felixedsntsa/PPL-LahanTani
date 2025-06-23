<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;

class C_Edukasi extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::simplePaginate(2);
        return view('admin.edukasi', compact('edukasis'));
    }

    public function show($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        return view('admin.detailedukasi', compact('edukasi'));
    }

    public function create() { return view('admin.tambahedukasi'); }

    public function convertToEmbedUrl($url) {
    // Ambil ID video
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $url, $match)) {
            return 'https://www.youtube.com/embed/' . $match[1];
        }

        return $url; // fallback, jika tidak bisa di-convert
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'youtube_url' => ['required', 'url', 'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/'],
            'penjelasan' => 'required'
        ]);
        $request->merge(['youtube_url' => $this->convertToEmbedUrl($request->youtube_url)]);
        Edukasi::create($request->only('judul', 'youtube_url', 'penjelasan'));
        return redirect()->route('admin.edukasi.index');
    }

    public function edit($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        return view('admin.editedukasi', compact('edukasi'));
    }

    public function update(Request $request, $id)
    {
        $edukasi = Edukasi::findOrFail($id);
        $edukasi->youtube_url = $this->convertToEmbedUrl($request->youtube_url);
        $edukasi->update($request->only('judul', 'youtube_url', 'penjelasan'));
        return redirect()->route('admin.edukasi.index');
    }

    public function destroy($id)
    {
        Edukasi::findOrFail($id)->delete();
        return redirect()->route('admin.edukasi.index');
    }
}
