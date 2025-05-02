@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow-lg border max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-green-700">Profil Saya</h2>

        <div class="space-y-4">
            <div>
                <label class="font-semibold">Username:</label>
                <p>{{ $user->username ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Email:</label>
                <p>{{ $user->email ?? '-' }}</p>
            </div>
            <div>
                <label class="font-semibold">Password:</label>
                <p class="italic text-gray-500">Tersimpan secara aman</p>
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ url('/admin/dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <a href="{{ route('profil.edit') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Ubah</a>
        </div>
    </div>
</div>

@endsection
