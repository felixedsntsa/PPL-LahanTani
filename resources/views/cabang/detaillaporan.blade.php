@extends('master.public')
@section('title', 'List Laporan')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Detail Laporan</h2>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-semibold">Tanggal:</span> {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-semibold">Deskripsi:</span></p>
            <p class="mt-1 text-gray-800 whitespace-pre-line">{{ $laporan->deskripsi }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-semibold mb-2">Dokumentasi:</p>
            <div class="flex flex-wrap gap-3">
                @forelse ($laporan->dokumentasi as $doc)
                    <img src="{{ asset('storage/' . $doc) }}" class="w-32 h-32 object-cover rounded border">
                @empty
                    <p class="text-gray-500">Tidak ada dokumentasi</p>
                @endforelse
            </div>
        </div>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-semibold">Feedback:</span></p>
            <p class="mt-1 text-gray-800">{{ $laporan->feedback ?? '-' }}</p>
        </div>

        <a href="{{ route('cabang.laporan') }}" class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 mt-4">
            ← Kembali ke Laporan
        </a>
    </div>
</div>

@endsection
