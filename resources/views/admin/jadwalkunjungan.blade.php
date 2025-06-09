@extends('master.public')
@section('title', 'Jadwal Kunjungan')
@section('content')

@include('master.navbar')

    <div class="p-6 mb-16">
        <div class="flex justify-between items-center mb-4 mt-4">
            <h2 class="text-xl font-bold mb-4">Jadwal Kunjungan</h2>
            <button onclick="toggleModal(true)" class="bg-green-600 text-white px-4 py-2 rounded-full hover:bg-green-700 mb-4">Tambah Jadwal</button>
        </div>
        <div id='calendar'></div>
    </div>

    <!-- Modal -->
    <div id="jadwalModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-96">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Tambah Jadwal Kunjungan</h3>
                <button onclick="toggleModal(false)">&times;</button>
            </div>
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label class="block text-sm font-medium">Nama Cabang</label>
                    <select name="cabang_id" required class="w-full border rounded px-2 py-1">
                        @foreach ($cabangs as $cabang)
                            <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Tanggal</label>
                    <input type="date" name="tanggal" required class="w-full border rounded px-2 py-1">
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Jam</label>
                    <div class="flex gap-2">
                        <input type="time" name="jam_mulai" required class="w-1/2 border rounded px-2 py-1">
                        <input type="time" name="jam_selesai" required class="w-1/2 border rounded px-2 py-1">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tujuan</label>
                    <textarea name="tujuan" required class="w-full border rounded px-2 py-1"></textarea>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded w-full">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Modal Detail Jadwal -->
    <div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-xl p-6 w-[360px] relative">
            <button onclick="closeDetailModal()" class="absolute top-3 right-3">
                &times;
            </button>
            <h3 class="text-lg font-bold mb-4">Jadwal Kunjungan</h3>
            <div class="flex items-center text-sm font-medium text-black mb-2">
                <img src="{{ asset('/asset/map_point.svg') }}" alt="Lokasi" class="w-4 h-4 mr-2">
                <span id="detailCabang"></span>
            </div>
            <div class="flex items-center text-sm font-medium text-black mb-2">
                <img src="{{ asset('/asset/clock.svg') }}" alt="Jam" class="w-4 h-4 mr-2">
                <span id="detailWaktu"></span>
            </div>
            <div class="flex items-start text-sm font-medium text-black">
                <img src="{{ asset('/asset/document.svg') }}" alt="Dokumen" class="w-4 h-4 mr-2 mt-1">
                <p id="detailTujuan" class="whitespace-pre-line"></p>
            </div>
            <div class="text-right mt-4">
                <button id="editButton" class="mt-4 bg-green-600 hover:bg-green-700 text-white px-6 py-1.5 rounded-lg">Edit</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-96 relative">
            <button onclick="closeEditModal()" class="absolute top-3 right-4 text-lg">&times;</button>
            <h3 class="text-lg font-bold mb-4">Edit Jadwal Kunjungan</h3>
            <form id="formEditJadwal">
                @csrf
                @method('PUT')
                <input type="hidden" id="editJadwalId">
                <div class="mb-2">
                    <label class="block text-sm font-medium">Nama Cabang</label>
                    <input type="text" id="editCabang" disabled class="w-full border rounded px-2 py-1 bg-gray-100">
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Tanggal</label>
                    <input type="date" id="editTanggal" name="tanggal" required class="w-full border rounded px-2 py-1">
                </div>
                <div class="mb-2">
                    <label class="block text-sm font-medium">Jam</label>
                    <div class="flex gap-2">
                        <input type="time" id="editJamMulai" name="jam_mulai" required class="w-1/2 border rounded px-2 py-1">
                        <input type="time" id="editJamSelesai" name="jam_selesai" required class="w-1/2 border rounded px-2 py-1">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tujuan</label>
                    <textarea id="editTujuan" name="tujuan" required class="w-full border rounded px-2 py-1"></textarea>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full w-full">Simpan</button>
            </form>
        </div>
    </div>

<div id="toast-success" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-full shadow-lg hidden z-[9999]">
    Jadwal berhasil diperbarui!
</div>

@include('master.footer')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
function toggleModal(show) {
    document.getElementById('jadwalModal').classList.toggle('hidden', !show);
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    function openDetailModal({ id ,waktu, tujuan, cabang }) {
        document.getElementById('detailCabang').textContent = cabang;
        document.getElementById('detailWaktu').textContent = waktu;
        document.getElementById('detailTujuan').textContent = tujuan;
        document.getElementById('editButton').onclick = function () {
            openEditModal(id);
        };
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openEditModal(jadwalId) {
        fetch(`/jadwal-kunjungan/${jadwalId}/edit`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('editJadwalId').value = data.id;
                document.getElementById('editCabang').value = data.cabang.nama;
                document.getElementById('editTanggal').value = data.tanggal;
                document.getElementById('editJamMulai').value = data.jam_mulai;
                document.getElementById('editJamSelesai').value = data.jam_selesai;
                document.getElementById('editTujuan').value = data.tujuan;
            });
    }

    document.getElementById('formEditJadwal').addEventListener('submit', function (e) {
        e.preventDefault();

        const id = document.getElementById('editJadwalId').value;
        const data = {
            tanggal: document.getElementById('editTanggal').value,
            jam_mulai: document.getElementById('editJamMulai').value,
            jam_selesai: document.getElementById('editJamSelesai').value,
            tujuan: document.getElementById('editTujuan').value,
            _method: 'POST',
            _token: '{{ csrf_token() }}',
        };

        fetch(`/jadwal-kunjungan/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(res => {
            closeEditModal();
            showSuccessToast('Jadwal berhasil diperbarui!');
            setTimeout(() => location.reload(), 1000);
        });
    });

    function showSuccessToast(message) {
        const toast = document.getElementById('toast-success');
        toast.textContent = message;
        toast.classList.remove('hidden');

        setTimeout(() => {
            toast.classList.add('hidden');
        }, 2000);
    }

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: ''
            },
            events: {
                url: '{{ route('admin.jadwal.events') }}',
                method: 'GET',
                failure: function() {
                    alert('Gagal mengambil data jadwal!');
                }
            },
            eventContent: function(arg) {
                const start = new Date(arg.event.start);
                const end = new Date(arg.event.end);
                const pad = n => n.toString().padStart(2, '0');

                const jamMulai = `${pad(start.getHours())}.${pad(start.getMinutes())}`;
                const jamSelesai = `${pad(end.getHours())}.${pad(end.getMinutes())}`;

                const jamRange = `${jamMulai} – ${jamSelesai}`;
                const calTitle = arg.event.extendedProps.cal_title || 'Tidak ada tujuan';

                return {
                    html: `
                        <div class="leading-tight ml-1 mr-2 mt-2 mb-2 p-2 bg-white rounded-lg shadow-md cursor-pointer">
                            <div class="mb-0.5 text-black font-extrabold text-2xl">${jamRange}</div>
                            <div style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" class="font-semibold text-black">
                                ${calTitle}
                            </div>
                        </div>
                    `
                };
            },
            eventClick: function(info) {
                const event = info.event;
                const start = new Date(event.start);
                const end = new Date(event.end);

                const hari = start.toLocaleDateString('id-ID', { weekday: 'long' });
                const tanggal = start.toLocaleDateString('id-ID', { month: 'long', day: 'numeric' });
                const jamMulai = start.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                const jamSelesai = end.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

                const waktu = `${hari}, ${tanggal} . ${jamMulai} – ${jamSelesai}`;

                openDetailModal({
                    id: event.id,
                    cabang: event.title.replace('Berkunjung ke ', ''),
                    waktu: waktu,
                    tujuan: event.extendedProps.description,
                });
            }
        });
        calendar.render();
    });
</script>
@endsection
