@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

    @include('master.navbar')

    {{-- Hero Section --}}
    <section class="px-8 py-12 flex flex-col md:flex-row items-center justify-center gap-80">
        <div class="max-w-lg">
            <h2 class="text-3xl md:text-4xl font-bold mb-3">
                <span class="text-green-700">LahanTani:</span> <br>
                Solusi Digital untuk Budidaya Buah <span class="text-green-700">Melon</span>
            </h2>
            <p class="text-gray-600 max-w-md mb-6">Aplikasi berbasis web yang dirancang untuk membantu mengelola dan memantau ladang melon secara daring.</p>
            <a href="{{ route('admin.laporan') }}" class="mt-6 bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-md font-medium gap-4">Mulai Sekarang</a>
        </div>
        <img src="/asset/bglaptop.png" alt="Laptop Screenshot" class="w-2/3 md:w-1/3 mt-10 md:mt-0">
    </section>

    {{-- Fitur Section --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6">
        <!-- Kartu 1 -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-12 h-12 bg-yellow-400 rounded-br-xl flex items-center justify-center">
            <img src="/asset/pemantauan.svg" class="w-7">
        </div>
        <div class="p-6 mt-8">
            <h3 class="font-bold text-lg group-hover:text-yellow-600 transition">Pemantauan</h3>
            <p class="text-sm text-gray-500">Pemantauan Lahan Melon</p>
        </div>
        </div>

        <!-- Kartu 2 -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-12 h-12 bg-red-500 rounded-br-xl flex items-center justify-center">
            <img src="/asset/calendar.svg" class="w-7">
            </div>
            <div class="p-6 mt-8">
                <h3 class="font-bold text-lg group-hover:text-red-500 transition">Jadwal Kunjungan</h3>
            <p class="text-sm text-gray-500">Kunjungan Ke Lahan Melon</p>
            </div>
        </div>

        <!-- Kartu 3 -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-12 h-12 bg-sky-500 rounded-br-xl flex items-center justify-center">
            <img src="/asset/bill.svg" class="w-7">
            </div>
            <div class="p-6 mt-8">
                <h3 class="font-bold text-lg group-hover:text-sky-500 transition">Hasil Panen</h3>
                <p class="text-sm text-gray-500">Laporan Hasil Panen</p>
            </div>
        </div>

        <!-- Kartu 4 -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 relative overflow-hidden group">
            <div class="absolute top-0 left-0 w-12 h-12 bg-purple-500 rounded-br-xl flex items-center justify-center">
                <img src="/asset/money.svg" class="w-7">
            </div>
            <div class="p-6 mt-8">
                <h3 class="font-bold text-lg group-hover:text-purple-500 transition">Hasil Jual</h3>
            <p class="text-sm text-gray-500">Grafik Pendapatan</p>
            </div>
        </div>
    </div>


    {{-- Keuntungan Section --}}
    <section class="bg-green-700 text-white py-5 px-4">
        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-center items-center gap-6">
            <div class="flex-1">
                <h3 class="text-2xl font-bold mb-4">Keuntungan Menggunakan Sistem Kami</h3>
                <ul class="space-y-2 list-disc list-inside">
                    <li>Pantauan lahan melon secara real-time dan terpusat.</li>
                    <li>Penjadwalan kunjungan yang mudah dan terorganisir.</li>
                    <li>Pencatatan hasil panen yang otomatis dan rapi.</li>
                    <li>Meningkatkan efisiensi kerja tim budidaya.</li>
                    <li>Semua data terintegrasi dalam satu platform digital.</li>
                </ul>
            </div>
            <img src="/asset/petanimelon.png" alt="Petani dan Melon" class="w-full max-w-xs md:max-w-sm">
        </div>
    </section>

    {{-- Testimoni --}}
    <section class="px-8 py-12 text-center bg-white">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-center mb-4">
                <img src="/asset/testiavatar.png" class="w-12 h-12 rounded-full" alt="Bapak Felix">
            </div>
            <p class="italic">“LahanTani sangat membantu saya dalam mengelola lahan melon. Sekarang saya bisa memantau kondisi tanaman dan menjadwalkan kunjungan dengan lebih mudah dan teratur. Aplikasi ini membuat pekerjaan saya jadi lebih efisien.”</p>
            <p class="mt-4 font-semibold">- Bapak Felix, petani melon</p>
        </div>
    </section>

    @include('master.footer')

@endsection
