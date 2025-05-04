@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Semua Laporan Cabang</h2>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="py-2 px-4">Cabang</th>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Deskripsi</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($laporans as $laporan)
                <tr>
                    <td class="py-2 px-4">{{ $laporan->cabang->nama }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4">{{ Str::limit($laporan->deskripsi, 50, '...') }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('admin.laporan.detail', $laporan->id) }}"
                            class="text-blue-600 hover:underline">Detail</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center py-4">Belum ada laporan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
