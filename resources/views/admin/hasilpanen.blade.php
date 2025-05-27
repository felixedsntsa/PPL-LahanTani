@extends('master.public')
@section('title', 'Hasil Panen')
@section('content')

@include('master.navbar')

<div x-data="panenDetail()" class="container mx-auto px-4 py-6">

    <h2 class="text-xl font-bold mb-2">Hasil Panen</h2>
    <div class="bg-white shadow rounded-lg p-6">
        <div class="overflow-x-auto">
            <div class="flex justify-between items-center mb-4 mt-3 ml-3">
            <form method="GET" action="{{ route('admin.hasilpanen') }}" class="w-full max-w-sm">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        placeholder="Cari hasil panen..."
                        value="{{ request('search') }}"
                        class="w-full border border-gray-300 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-1 focus:ring-green-300
"
                    />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>

            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Nama Cabang</th>
                        <th class="py-2 px-4 border-b">Periode Panen</th>
                        <th class="py-2 px-4 border-b">Total Panen</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                        <th class="py-2 px-4 border-b"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($hasilPanens as $index => $panen)
                        <tr @click="showDetail({{ $panen->toJson() }})">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($panen->created_at)->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">{{ $panen->cabang->nama }}</td>
                            <td class="py-2 px-4">{{ $panen->periode_panen }}</td>
                            <td class="py-2 px-4">{{ $panen->total_panen }} kg</td>
                            <td class="py-2 px-4">
                                <div class="flex items-center justify-between">
                                    <span>{{ \Illuminate\Support\Str::limit($panen->keterangan, 50, '...') }}</span>
                                    <button
                                        @click.stop="showDetail({{ $panen->toJson() }})"
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm"
                                    >
                                        Selengkapnya
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">Belum ada data hasil panen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $hasilPanens->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Detail Card -->
    <div x-show="isDetailVisible" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-lg mx-auto px-8 py-6 relative" @click.away="isDetailVisible = false">
            <!-- Tombol Close -->
            <button @click="isDetailVisible = false" class="absolute top-3 right-4 text-2xl text-gray-600 hover:text-black">&times;</button>

            <!-- Preview Content Modal -->
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-6 text-black">Detail Hasil Panen</h2>

                <div class="space-y-4">
                    <!-- Nama Cabang -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Nama Cabang</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            x-bind:value="detailData.cabang?.nama" readonly>
                    </div>

                    <!-- Tanggal -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Tanggal</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            :value="formatDate(detailData.created_at)" readonly>
                    </div>

                    <!-- Periode Panen -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Periode panen</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            x-bind:value="detailData.periode_panen + ' Hari'" readonly>
                    </div>

                    <!-- Total Panen -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Total panen</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            x-bind:value="detailData.total_panen + ' Kg'" readonly>
                    </div>

                    <!-- Keterangan -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Keterangan</label>
                        <textarea rows="5" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100 text-sm text-black text-justify resize-none"
                            x-text="detailData.keterangan" readonly></textarea>
                    </div>

                    <!-- Tombol Cetak PDF -->
                    <div class="text-right mt-6">
                        <button @click="printPDF()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm shadow">
                            Cetak PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="print-area" style="display: none;"></div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function panenDetail() {
        return {
            isDetailVisible: false,
            detailData: {},

            showDetail(data) {
                this.detailData = data;
                this.isDetailVisible = true;
            },

            formatDate(dateString) {
                if (!dateString) return '';
                const d = new Date(dateString);
                const day = String(d.getDate()).padStart(2, '0');
                const month = String(d.getMonth() + 1).padStart(2, '0');
                const year = d.getFullYear();
                return `${day} - ${month} - ${year}`;
            },

            printPDF() {
                // Buat isi HTML secara manual
                const content = `
                    <div style="width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
                        <h1 style="text-align: center; font-size: 24px; margin-bottom: 30px; font-weight: bold;">Laporan Hasil Panen</h1>

                        <table style="width: 100%; margin-bottom: 30px; border-collapse: collapse;">
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 8px; width: 30%; font-weight: bold;">Nama Cabang</td>
                                <td style="padding: 8px;">${this.detailData.cabang?.nama || '-'}</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 8px; font-weight: bold;">Tanggal</td>
                                <td style="padding: 8px;">${this.formatDate(this.detailData.created_at)}</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 8px; font-weight: bold;">Periode Panen</td>
                                <td style="padding: 8px;">${this.detailData.periode_panen} Hari</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 8px; font-weight: bold;">Total Panen</td>
                                <td style="padding: 8px;">${this.detailData.total_panen} Kg</td>
                            </tr>
                        </table>

                        <div>
                            <h2 style="font-weight: bold; margin-bottom: 10px;">Keterangan</h2>
                            <p style="text-align: justify; line-height: 1.5;">${this.detailData.keterangan || '-'}</p>
                        </div>
                    </div>
                `;

                // Masukkan ke elemen tersembunyi
                const printArea = document.getElementById('print-area');
                printArea.innerHTML = content;
                printArea.style.display = 'block';

                const opt = {
                    margin: [0.5, 0.5, 0.5, 0.5],
                    filename: 'laporan-hasil-panen-' + new Date().toISOString().slice(0,10) + '.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: {
                        scale: 2,
                        logging: true,
                        useCORS: true,
                        allowTaint: true
                    },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
                };

                html2pdf().set(opt).from(printArea).save().then(() => {
                    printArea.innerHTML = '';
                    printArea.style.display = 'none';
                });
            }
        };
    }
</script>

@endsection
