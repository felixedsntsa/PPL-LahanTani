@extends('master.public')
@section('title', 'Edit Profil')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xl mx-auto border">
        <h2 class="text-2xl font-bold mb-6 text-green-700">Edit Profil Cabang</h2>

        @if(session('message'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('cabang.profil.update') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Nama Cabang</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="w-full px-4 py-2 border rounded">
                @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Nama Pekerja</label>
                <input type="text" name="nama_pekerja" value="{{ old('nama_pekerja', $user->nama_pekerja) }}" class="w-full px-4 py-2 border rounded">
                @error('nama_pekerja') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" class="w-full px-4 py-2 border rounded">
                @error('no_hp') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $user->lokasi) }}" class="w-full px-4 py-2 border rounded">
                @error('lokasi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Password Baru</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded">
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password.</p>
            </div>

            <div class="mb-6">
                <label class="block font-semibold">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded">
            </div>

            <div class="flex justify-between">
                <a href="{{ url('/cabang/dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@endsection
