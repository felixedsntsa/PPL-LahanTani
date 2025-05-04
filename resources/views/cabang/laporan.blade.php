@extends('master.public')
@section('title', 'List Laporan')
@section('content')

@include('master.navbar2')

@php use Illuminate\Support\Str; @endphp

<div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6">Laporan Pemantauan Cabang</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Riwayat Laporan --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Riwayat Laporan</h3>
            <a href="{{ route('cabang.laporan.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                + Tambah Laporan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Deskripsi</th>
                        <th class="py-2 px-4">Dokumentasi</th>
                        <th class="py-2 px-4">Feedback</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($laporans as $index => $laporan)
                        <tr>
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('cabang.laporan.show', $laporan->id) }}" class="text-blue-600 hover:underline">
                                    {{ \Illuminate\Support\Str::limit($laporan->deskripsi, 100, '...') }}
                                </a>
                            </td>
                            <td class="py-2 px-4 flex flex-wrap gap-2">
                                @foreach ($laporan->dokumentasi as $doc)
                                    <img src="{{ asset('storage/' . $doc) }}" class="w-20 h-20 object-cover rounded">
                                @endforeach
                            </td>
                            <td class="py-2 px-4">{{ $laporan->feedback ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">Belum ada laporan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
