@extends('master.public')
@section('title', 'Hasil Panen')
@section('content')

@include('master.navbar2')

<div x-data="{ open: false, showDetail: false, detailData: {} }" class="container mx-auto px-4 py-6">

    {{-- Header + Tombol Tambah --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Hasil Panen</h2>
        <button @click="open = true" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Tambah</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Periode Panen</th>
                        <th class="py-2 px-4 border-b">Total Panen</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($hasilPanens as $index => $panen)
                        <tr @click="showDetail = true; detailData = {{ $panen->toJson() }}"
                            class="cursor-pointer hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $panen->created_at->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">{{ $panen->periode_panen }}</td>
                            <td class="py-2 px-4">{{ $panen->total_panen }} kg</td>
                            <td class="py-2 px-4">{{ Str::limit($panen->keterangan, 50, '...') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">Belum ada data hasil panen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-[400px] relative">
            <button @click="open = false" class="absolute top-2 right-3 text-xl">&times;</button>

            <h2 class="text-lg font-semibold mb-4">Tambah Laporan Hasil Panen</h2>

            <form action="{{ route('cabang.hasilpanen.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block font-medium">Periode panen</label>
                    <input type="text" name="periode_panen" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-3">
                    <label class="block font-medium">Total panen</label>
                    <input type="number" name="total_panen" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-3">
                    <label class="block font-medium">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded w-full hover:bg-green-700">Kirim</button>
            </form>
        </div>
    </div>

    <!-- Modal Detail - Cabang -->
    <div x-show="showDetail" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md mx-auto p-6 relative" @click.away="showDetail = false">
            <!-- Tombol Close -->
            <button @click="showDetail = false" class="absolute top-3 right-4 text-2xl text-gray-600 hover:text-black">&times;</button>

            <!-- Judul -->
            <h2 class="text-xl font-semibold mb-5 text-center">Laporan Hasil Panen</h2>

            <!-- Field Detail -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" x-bind:value="new Date(detailData.created_at).toLocaleDateString('id-ID')" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Periode panen</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" x-bind:value="detailData.periode_panen" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Total panen</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100" x-bind:value="detailData.total_panen" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <textarea class="w-full border rounded px-3 py-2 bg-gray-100" rows="4" x-text="detailData.keterangan || '-'" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
