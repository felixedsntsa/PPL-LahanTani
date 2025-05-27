@extends('master.public')
@section('title', 'List Laporan')
@section('content')

@include('master.navbar2')

@php use Illuminate\Support\Str; @endphp

<div class="max-w-6xl mx-auto py-10 px-4">
    {{-- Search Bar --}}
    <div class="mb-6 flex justify-between items-center">
        <input type="text" placeholder="Cari..." class="w-1/3 px-4 py-2 border rounded-full focus:outline-none">
        <a href="{{ route('cabang.laporan.create') }}" class="text-green-600 text-3xl font-bold hover:text-green-700">+</a>
    </div>

    {{-- Box Riwayat Laporan --}}
    <div class="bg-white shadow rounded-lg p-6 border">
        <h3 class="text-xl font-semibold mb-4">Riwayat Laporan</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="text-gray-700 font-semibold border-b">
                    <tr>
                        <th class="py-2 px-4">No.</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Nama Cabang</th>
                        <th class="py-2 px-4">Dokumentasi</th>
                        <th class="py-2 px-4">Deskripsi</th>
                        <th class="py-2 px-4">Feedback</th>
                        <th class="py-2 px-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($laporans as $index => $laporan)
                        <tr>
                            <td class="py-2 px-4">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">{{ $laporan->cabang->nama ?? '-' }}</td>
                            <td class="py-2 px-4">
                                <div class="inline-flex items-center bg-gray-100 border rounded px-2 py-1 gap-1">
                                    <img src="{{ asset('asset/image-icon.png') }}" alt="Dokumentasi" class="w-4 h-4">
                                    <span>{{ count($laporan->dokumentasi) }}+</span>
                                </div>
                            </td>
                            <td class="py-2 px-4">{{ Str::limit($laporan->deskripsi, 20) }}</td>
                            <td class="py-2 px-4">{{ Str::limit($laporan->feedback ?? '-', 20) }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('cabang.laporan.show', $laporan->id) }}"
                                    class="bg-green-600 text-white px-3 py-1.5 rounded-full text-sm hover:bg-green-700">
                                    Selengkapnya
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-gray-500">Belum ada laporan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
