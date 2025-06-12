@extends('master.public')
@section('title', 'Jadwal Kunjungan')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Jadwal Kunjungan</h1>
                <p class="text-gray-600 mt-1">Kelola jadwal kunjungan ke cabang-cabang</p>
            </div>
            <button onclick="toggleModal(true)"
                    class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Jadwal
            </button>
        </div>

        <!-- Calendar Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <div id='calendar'></div>
        </div>
    </div>
</div>

<!-- Modal Tambah Jadwal -->
<div id="jadwalModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden transition-opacity duration-300">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Jadwal Kunjungan
                </h3>
                <button onclick="toggleModal(false)" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Cabang</label>
                        <select name="cabang_id" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            @foreach ($cabangs as $cabang)
                                <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <div class="relative">
                            <input type="date" name="tanggal" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Kunjungan</label>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="relative">
                                <input type="time" name="jam_mulai" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="time" name="jam_selesai" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan Kunjungan</label>
                        <textarea name="tujuan" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal(false)" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail Jadwal -->
<div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden transition-opacity duration-300">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="detailModalContent">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Detail Kunjungan
                </h3>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Cabang</p>
                        <p id="detailCabang" class="font-medium text-gray-800"></p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Waktu Kunjungan</p>
                        <p id="detailWaktu" class="font-medium text-gray-800"></p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tujuan</p>
                        <p id="detailTujuan" class="font-medium text-gray-800 whitespace-pre-line"></p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="closeDetailModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                    Tutup
                </button>
                <button id="editButton" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                    Edit Jadwal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Jadwal -->
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden transition-opacity duration-300">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="editModalContent">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Jadwal
                </h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="formEditJadwal">
                @csrf
                @method('PUT')
                <input type="hidden" id="editJadwalId">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cabang</label>
                        <input type="text" id="editCabang" disabled class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <div class="relative">
                            <input type="date" id="editTanggal" name="tanggal" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Kunjungan</label>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="relative">
                                <input type="time" id="editJamMulai" name="jam_mulai" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="time" id="editJamSelesai" name="jam_selesai" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan Kunjungan</label>
                        <textarea id="editTujuan" name="tujuan" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast-success" class="fixed bottom-4 right-4 flex items-center p-4 mb-4 text-sm text-white bg-green-600 rounded-lg shadow-lg z-[9999] hidden transition-all duration-300 transform translate-x-full">
    <svg class="flex-shrink-0 w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div id="toast-message">Jadwal berhasil diperbarui!</div>
</div>

@include('master.footer')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
    // Fungsi Toggle Modal dengan Animasi
    function toggleModal(show) {
        const modal = document.getElementById('jadwalModal');
        const modalContent = document.getElementById('modalContent');

        if (show) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    }

    // Fungsi Detail Modal
    function closeDetailModal() {
        const modalContent = document.getElementById('detailModalContent');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            document.getElementById('detailModal').classList.add('hidden');
        }, 300);
    }

    function openDetailModal({ id, waktu, tujuan, cabang }) {
        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('detailModalContent');

        document.getElementById('detailCabang').textContent = cabang;
        document.getElementById('detailWaktu').textContent = waktu;
        document.getElementById('detailTujuan').textContent = tujuan;
        document.getElementById('editButton').onclick = function () {
            closeDetailModal();
            setTimeout(() => openEditModal(id), 300);
        };

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    // Fungsi Edit Modal
    function closeEditModal() {
        const modalContent = document.getElementById('editModalContent');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            document.getElementById('editModal').classList.add('hidden');
        }, 300);
    }

    function openEditModal(jadwalId) {
        const modal = document.getElementById('editModal');
        const modalContent = document.getElementById('editModalContent');

        fetch(`/jadwal-kunjungan/${jadwalId}/edit`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('editJadwalId').value = data.id;
                document.getElementById('editCabang').value = data.cabang.nama;
                document.getElementById('editTanggal').value = data.tanggal;
                document.getElementById('editJamMulai').value = data.jam_mulai;
                document.getElementById('editJamSelesai').value = data.jam_selesai;
                document.getElementById('editTujuan').value = data.tujuan;

                modal.classList.remove('hidden');
                setTimeout(() => {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            });
    }

    // Form Submission
    document.getElementById('formEditJadwal').addEventListener('submit', function (e) {
        e.preventDefault();

        const id = document.getElementById('editJadwalId').value;
        const data = {
            tanggal: document.getElementById('editTanggal').value,
            jam_mulai: document.getElementById('editJamMulai').value,
            jam_selesai: document.getElementById('editJamSelesai').value,
            tujuan: document.getElementById('editTujuan').value,
            _method: 'PUT',
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

    // Toast Notification
    function showSuccessToast(message) {
        const toast = document.getElementById('toast-success');
        const toastMessage = document.getElementById('toast-message');

        toastMessage.textContent = message;
        toast.classList.remove('hidden', 'translate-x-full');
        toast.classList.add('translate-x-0');

        setTimeout(() => {
            toast.classList.remove('translate-x-0');
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.classList.add('hidden'), 300);
        }, 3000);
    }

    // FullCalendar Initialization
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap5',
            firstDay: 1,
            navLinks: true,
            editable: true,
            dayMaxEvents: true,
            events: {
                url: '{{ route('admin.jadwal.events') }}',
                method: 'GET',
                failure: function() {
                    showSuccessToast('Gagal mengambil data jadwal!', 'error');
                }
            },
            eventClassNames: function(arg) {
                return ['fc-event-custom'];
            },
            eventContent: function(arg) {
                const start = new Date(arg.event.start);
                const end = new Date(arg.event.end);
                const pad = n => n.toString().padStart(2, '0');

                const jamMulai = `${pad(start.getHours())}.${pad(start.getMinutes())}`;
                const jamSelesai = `${pad(end.getHours())}.${pad(end.getMinutes())}`;

                const jamRange = `${jamMulai} – ${jamSelesai}`;
                const namaCabang = arg.event.extendedProps.cabang_nama || 'Tidak ada tujuan';

                return {
                    html: `
                        <div class="fc-event-main-frame">
                            <div class="fc-event-time-container">
                                <div class="fc-event-time fc-event-time-custom">${jamRange}</div>
                            </div>
                            <div class="fc-event-title-container">
                                <div class="fc-event-title fc-event-title-custom">${namaCabang}</div>
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
                const tanggal = start.toLocaleDateString('id-ID', { month: 'long', day: 'numeric', year: 'numeric' });
                const jamMulai = start.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                const jamSelesai = end.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

                const waktu = `${hari}, ${tanggal} · ${jamMulai} – ${jamSelesai}`;

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

<style>
    /* Custom Calendar Styles */
    .fc {
        font-family: inherit;
    }

    .fc .fc-toolbar-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
    }

    .fc .fc-button {
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        color: #374151;
        font-weight: 500;
        padding: 0.4rem 0.8rem;
        border-radius: 0.375rem;
        transition: all 0.2s;
    }

    .fc .fc-button:hover {
        background-color: #e5e7eb;
    }

    .fc .fc-button-primary:not(:disabled).fc-button-active {
        background-color: #10b981;
        border-color: #10b981;
        color: white;
    }

    .fc .fc-daygrid-day-number {
        color: #374151;
        font-weight: 500;
        padding: 0.5rem;
    }

    .fc .fc-daygrid-day.fc-day-today {
        background-color: #ecfdf5;
    }

    .fc-event-custom {
        border: none;
        background-color: #10b981;
        color: white;
        border-radius: 0.375rem;
        padding: 0.25rem 0.5rem;
        margin-bottom: 0.25rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .fc-event-custom:hover {
        background-color: #059669;
    }

    .fc-event-time-custom {
        font-weight: 600;
        font-size: 0.75rem;
    }

    .fc-event-title-custom {
        font-weight: 500;
        font-size: 0.875rem;
        margin-top: 0.125rem;
    }

    .fc .fc-daygrid-event-dot {
        display: none;
    }

    .fc .fc-daygrid-day-frame {
        min-height: 5rem;
    }
</style>

@endsection
