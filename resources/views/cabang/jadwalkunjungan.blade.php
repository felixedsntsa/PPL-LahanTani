@extends('master.public')
@section('title', 'Jadwal Kunjungan')
@section('content')

@include('master.navbar2')

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-teal-50 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Jadwal Kunjungan</h1>
                <p class="text-gray-600 mt-1">Pantau jadwal kunjungan admin ke lahan</p>
            </div>
        </div>

        <!-- Calendar Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <div id='calendar'></div>
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
            </div>
        </div>
    </div>
</div>

@include('master.footer2')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {
                url: '{{ route('cabang.jadwal.events') }}',
                failure: function(error) {
                    console.error('Calendar error:', error);
                    alert('Gagal memuat jadwal: ' + error.message);
                }
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            eventClassNames: 'fc-event-custom',
            eventContent: function(arg) {
                const start = new Date(arg.event.start);
                const end = new Date(arg.event.end);
                const pad = n => n.toString().padStart(2, '0');

                const jamMulai = `${pad(start.getHours())}.${pad(start.getMinutes())}`;
                const jamSelesai = `${pad(end.getHours())}.${pad(end.getMinutes())}`;

                return {
                    html: `
                        <div class="fc-event-main-frame">
                            <div class="fc-event-time-container">
                                <span class="fc-event-time-custom">${jamMulai} - ${jamSelesai}</span>
                            </div>
                            <div class="fc-event-title-container">
                                <div class="fc-event-title-custom">Berkunjung ke lahan</div>
                            </div>
                        </div>
                    `
                };
            },
            eventClick: function(info) {
                const event = info.event;
                const start = new Date(event.start);
                const end = new Date(event.end);

                // Format tanggal & waktu
                const hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                function pad(n) {
                    return n.toString().padStart(2, '0');
                }

                const tanggal = `${hari[start.getDay()]}, ${start.getDate()} ${bulan[start.getMonth()]} ${start.getFullYear()}`;
                const jamMulai = `${pad(start.getHours())}.${pad(start.getMinutes())}`;
                const jamSelesai = `${pad(end.getHours())}.${pad(end.getMinutes())}`;

                // Tampilkan ke modal
                document.getElementById('detailCabang').textContent = event.title;
                document.getElementById('detailWaktu').textContent = `${tanggal}\n${jamMulai} - ${jamSelesai}`;
                document.getElementById('detailTujuan').textContent = event.extendedProps.description || 'Tidak ada deskripsi';

                // Buka modal
                openDetailModal();
            }
        });

        calendar.render();
    });

    function openDetailModal() {
        const modal = document.getElementById('detailModal');
        const content = document.getElementById('detailModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        const content = document.getElementById('detailModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>

<style>
    /* Custom Calendar Styles */
    .fc {
        font-family: inherit;
        --fc-border-color: #e5e7eb;
        --fc-today-bg-color: #ecfdf5;
        --fc-neutral-bg-color: #f9fafb;
        --fc-page-bg-color: #ffffff;
        --fc-event-bg-color: #10b981;
        --fc-event-border-color: #10b981;
        --fc-event-text-color: #ffffff;
        padding: 1rem;
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
        border-radius: 0.5rem;
        transition: all 0.2s;
        text-transform: capitalize;
    }

    .fc .fc-button:hover {
        background-color: #e5e7eb;
    }

    .fc .fc-button-primary:not(:disabled).fc-button-active,
    .fc .fc-button-primary:not(:disabled):active {
        background-color: #10b981;
        border-color: #10b981;
        color: white;
    }

    .fc .fc-button-primary:focus {
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.5);
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
        border-radius: 0.5rem;
        padding: 0.5rem;
        margin-bottom: 0.25rem;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .fc-event-custom:hover {
        background-color: #059669;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .fc-event-time-custom {
        font-weight: 600;
        font-size: 0.75rem;
        display: block;
        margin-bottom: 0.125rem;
    }

    .fc-event-title-custom {
        font-weight: 500;
        font-size: 0.875rem;
    }

    .fc .fc-daygrid-event-dot {
        display: none;
    }

    .fc .fc-daygrid-day-frame {
        min-height: 6rem;
        padding: 0.25rem;
    }

    .fc .fc-col-header-cell {
        padding: 0.5rem;
        background-color: #f9fafb;
    }

    .fc .fc-col-header-cell-cushion {
        color: #374151;
        font-weight: 500;
        text-decoration: none;
    }

    .fc .fc-daygrid-day-top {
        flex-direction: row;
    }

    .fc .fc-daygrid-day-events {
        margin-top: 0.25rem;
    }

    .fc .fc-scrollgrid-section-header > td {
        border-color: #e5e7eb;
    }

    .fc .fc-daygrid-day {
        border-color: #e5e7eb;
    }

    .fc .fc-daygrid-day:hover {
        background-color: #f9fafb;
    }

    .fc .fc-daygrid-day-number:hover {
        color: #10b981;
    }

    .fc .fc-today-button {
        background-color: #10b981;
        border-color: #10b981;
        color: white;
    }

    .fc .fc-today-button:hover {
        background-color: #059669;
        border-color: #059669;
    }
</style>

@endsection
