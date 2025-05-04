@extends('master.public')
@section('title', 'Tambah Laporan')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Tambah Laporan</h3>
            <a href="{{ route('cabang.laporan') }}" class="text-sm text-gray-600 hover:text-gray-900">
                ← Kembali ke Riwayat Laporan
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cabang.laporan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="dokumentasi" class="block text-sm font-medium text-gray-700 mb-1">Dokumentasi (bisa lebih dari 1):</label>
                <input type="file" name="dokumentasi[]" id="dokumentasi" multiple
                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                        file:rounded file:border-0 file:text-sm file:font-semibold
                        file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full border-gray-300 rounded shadow-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Masukkan deskripsi laporan..."></textarea>
            </div>

            <div>
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
