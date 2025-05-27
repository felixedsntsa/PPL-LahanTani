@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-8 rounded-xl shadow-md border max-w-xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Saya</h2>
        <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengobrol, melindungi dan mengamankan akun</p>
        <hr class="mb-6">

        <div class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Cabang</label>
                <input type="text" value="{{ $user->nama ?? '-' }}" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" value="{{ $user->email ?? '-' }}" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" value="********" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Pekerja</label>
                <input type="text" value="{{ $user->nama_pekerja ?? '-' }}" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nomor Hp</label>
                <input type="text" value="{{ $user->no_hp ?? '-' }}" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Lokasi Lahan</label>
                <input type="text" value="{{ $user->lokasi ?? '-' }}" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <input type="text" value="{{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}" class="w-full border border-gray-300 rounded-md px-4 py-2 bg-gray-100" disabled>
            </div>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('cabang.profil.edit') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-md">
                Ubah
            </a>
        </div>
    </div>
</div>

@endsection
