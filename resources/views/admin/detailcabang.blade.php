@extends('master.public')
@section('title', 'Detail Cabang')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow-lg border">
        <h2 class="text-2xl font-bold mb-4 text-green-700">Detail Cabang: {{ $cabang->nama }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <strong>Nama Cabang:</strong>
                <p>{{ $cabang->nama }}</p>
            </div>
            <div>
                <strong>No HP:</strong>
                <p>{{ $cabang->no_hp }}</p>
            </div>
            <div>
                <strong>Email:</strong>
                <p>{{ $cabang->email }}</p>
            </div>
            <div>
                <strong>Lokasi Lahan:</strong>
                <p>{{ $cabang->lokasi }}</p>
            </div>
            <div>
                <strong>Status:</strong>
                <p>{{ $cabang->status ? 'Aktif' : 'Tidak Aktif' }}</p>
            </div>
            <div>
                <strong>Nama Pekerja:</strong>
                <p>{{ $cabang->nama_pekerja }}</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </div>
    </div>
</div>
@endsection
