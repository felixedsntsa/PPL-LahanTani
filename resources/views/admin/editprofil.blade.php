@extends('master.public')
@section('title', 'Ubah Profil')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow-lg border max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-green-700">Ubah Profil</h2>

        @if(session('message'))
            <div class="mb-4 text-green-700 bg-green-100 border border-green-400 px-4 py-2 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="font-semibold block mb-1">Username:</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('username')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold block mb-1">Email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold block mb-1">Password Baru:</label>
                    <input type="password" name="password"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="font-semibold block mb-1">Konfirmasi Password:</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ url('/admin/dashboard') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">Batal</a>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
