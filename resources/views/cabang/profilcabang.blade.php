@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow-lg border max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-green-700">Profil Saya</h2>

        <div class="space-y-4">
            <div>
                <label class="font-semibold">Nama:</label>
                <p>{{ $user->nama ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Email:</label>
                <p>{{ $user->email ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Nama Pekerja:</label>
                <p>{{ $user->nama_pekerja ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Nomor HP:</label>
                <p>{{ $user->no_hp ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Lokasi:</label>
                <p>{{ $user->lokasi ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Status:</label>
                <p>{{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</p>
            </div>
            <div>
                <label class="font-semibold">Password:</label>
                <p class="italic text-gray-500">Tersimpan secara aman</p>
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ url('/cabang/dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <a href="{{ route('cabang.profil.edit') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Ubah</a>
        </div>
    </div>
</div>

@endsection
