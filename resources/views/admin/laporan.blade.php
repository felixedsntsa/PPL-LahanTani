@extends('master.public')
@section('title', 'Laporan Cabang')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Laporan Pemantauan</h2>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Nama Cabang</th>
                    <th class="py-2 px-4">Dokumentasi</th>
                    <th class="py-2 px-4">Deskripsi</th>
                    <th class="py-2 px-4">Feedback</th>
                    <th class="py-2 px-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($laporans as $laporan)
                <tr>
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4">{{ $laporan->cabang->nama }}</td>
                    <td class="py-2 px-4 flex flex-wrap gap-2">
                        @foreach ($laporan->dokumentasi as $doc)
                            <img src="{{ asset('storage/' . $doc) }}" class="w-20 h-20 object-cover rounded">
                        @endforeach
                    </td>
                    <td class="py-2 px-4">{{ Str::limit($laporan->deskripsi, 30, '...') }}</td>
                    <td class="py-2 px-4">
                        <div class="flex items-center justify-between gap-2">
                            <span>{{ $laporan->feedback ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="py-2 px-4">
                        <a href="{{ route('admin.laporan.feedback', $laporan->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm">Selengkapnya</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-4">Belum ada laporan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
