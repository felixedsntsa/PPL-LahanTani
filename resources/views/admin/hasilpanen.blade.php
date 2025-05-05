@extends('master.public')
@section('title', 'Hasil Panen')
@section('content')

@include('master.navbar')

<div x-data="{ showDetail: false, detailData: {} }" class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Daftar Hasil Panen</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Cabang</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Periode</th>
                        <th class="py-2 px-4 border-b">Total Panen</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($hasilPanens as $index => $panen)
                        <tr @click="showDetail = true; detailData = {{ $panen->toJson() }}"
                            class="cursor-pointer hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $panen->cabang->nama }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($panen->created_at)->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">{{ $panen->periode_panen }}</td>
                            <td class="py-2 px-4">{{ $panen->total_panen }}</td>
                            <td class="py-2 px-4">{{ \Illuminate\Support\Str::limit($panen->keterangan, 50, '...') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">Belum ada data hasil panen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Detail -->
    <div x-show="showDetail" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-[400px] relative" @click.away="showDetail = false">
            <button @click="showDetail = false" class="absolute top-2 right-3 text-xl">&times;</button>
            <h2 class="text-lg font-semibold mb-4">Detail Hasil Panen</h2>

            <template x-if="detailData.cabang">
                <p><strong>Cabang:</strong> <span x-text="detailData.cabang.nama"></span></p>
            </template>
            <p><strong>Tanggal:</strong> <span x-text="new Date(detailData.created_at).toLocaleDateString('id-ID')"></span></p>
            <p><strong>Periode:</strong> <span x-text="detailData.periode_panen"></span></p>
            <p><strong>Total Panen:</strong> <span x-text="detailData.total_panen"></span></p>
            <p><strong>Keterangan:</strong></p>
            <p class="text-gray-700 mt-1" x-text="detailData.keterangan || '-'"></p>
        </div>
    </div>
</div>

@endsection
