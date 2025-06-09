@extends('master.public')
@section('title', 'Jadwal Kunjungan')
@section('content')
@include('master.navbar2')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Jadwal Kunjungan Saya</h2>
        <div id='calendar'></div>
    </div>

    <!-- Modal Detail Kunjungan -->
    <div id="modalDetail" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-2xl p-6 w-96 shadow-xl relative">
            <button onclick="toggleDetailModal(false)" class="absolute top-4 right-4 text-gray-600 hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <h3 class="text-lg font-bold mb-4 text-gray-900">Jadwal Kunjungan</h3>

            <div class="flex items-start text-sm text-gray-900 mb-3">
                <img src="/asset/clock.svg" alt="Jam" class="w-5 h-5 mr-2 mt-0.5">
                <span id="detailTanggal" class="font-medium"></span>
                <span class="mx-1 font-medium">.</span>
                <span id="detailJam" class="font-medium"></span>
            </div>

            <div class="flex items-start text-sm text-gray-900">
                <img src="/asset/document.svg" alt="Tujuan" class="w-5 h-5 mr-2 mt-0.5">
                <span id="detailTujuan" class="font-medium"></span>
            </div>
        </div>
    </div>

    @include('master.footer2')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            eventContent: function(arg) {
                const start = new Date(arg.event.start);
                const end = new Date(arg.event.end);
                const pad = n => n.toString().padStart(2, '0');

                const jamMulai = `${pad(start.getHours())}.${pad(start.getMinutes())}`;
                const jamSelesai = `${pad(end.getHours())}.${pad(end.getMinutes())}`;

                const jamRange = `${jamMulai} – ${jamSelesai}`;
                const title = arg.event.title;

                return {
                    html: `
                        <div class="leading-tight ml-4 mr-4 mt-2 mb-2 p-2 bg-white rounded-lg shadow-md cursor-pointer">
                            <div class="mb-0.5 text-black font-extrabold text-2xl">${jamRange}</div>
                            <div style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" class="font-semibold text-black">Berkunjung ke lahan</div>
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

                const tanggal = `${hari[start.getDay()]}, ${start.getDate()} ${bulan[start.getMonth()]}`;
                const jamMulai = `${pad(start.getHours())}.${pad(start.getMinutes())}`;
                const jamSelesai = `${pad(end.getHours())}.${pad(end.getMinutes())}`;

                // Tampilkan ke modal
                document.getElementById('detailTanggal').textContent = tanggal;
                document.getElementById('detailJam').textContent = `${jamMulai} – ${jamSelesai}`;
                document.getElementById('detailTujuan').textContent = event.extendedProps.description;

                // Buka modal
                toggleDetailModal(true);
            }
        });

        calendar.render();
    });

    function toggleDetailModal(show) {
        document.getElementById('modalDetail').classList.toggle('hidden', !show);
    }
</script>
@endsection
