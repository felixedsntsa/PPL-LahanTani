@extends('master.public')
@section('title', 'Akun Cabang')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-teal-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div x-data="{ showModal: {{ request('showModal') === 'true' ? 'true' : 'false' }} }">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Akun Cabang</h1>
                    <p class="text-gray-600">Kelola semua akun cabang perusahaan</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <!-- Search Form -->
                    <form action="{{ route('admin.akuncabang') }}" method="GET" class="w-full sm:w-64">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="nama"
                                value="{{ $nama }}"
                                class="w-full border border-gray-300 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 transition"
                                placeholder="Cari akun cabang"
                            >
                        </div>
                    </form>

                    <!-- Add Button -->
                    <button
                        @click="showModal = true"
                        class="flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Cabang
                    </button>
                </div>
            </div>

            <!-- Success Alert -->
            @if (Session::has('alertSuccess'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ Session::get('alertSuccess') }}</span>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" class="text-green-700 hover:text-green-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Modal Tambah Cabang -->
            <div
                x-show="showModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4"
                x-cloak>
                <div
                    @click.away="showModal = false"
                    class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                    <!-- Modal Header -->
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 rounded-t-xl">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-white">Tambah Data Akun Cabang</h2>
                            <button @click="showModal = false" class="text-white hover:text-gray-200 text-2xl font-bold">&times;</button>
                        </div>
                    </div>

                    <!-- Error Alert -->
                    @if (Session::has('alertError'))
                        <div class="mx-6 mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>{{ Session::get('alertError') }}</span>
                                </div>
                                <button onclick="this.parentElement.parentElement.remove()" class="text-red-700 hover:text-red-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Modal Body -->
                    <div class="p-6">
                        <form action="{{ route('admin.akuncabang.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Cabang</label>
                                    <input
                                        type="text"
                                        name="nama"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Masukkan nama cabang"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Handphone</label>
                                    <input
                                        type="text"
                                        name="no_hp"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Masukkan nomor handphone"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Masukkan email"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Lahan</label>
                                    <input
                                        type="text"
                                        name="lokasi"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Masukkan lokasi lahan"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Masukkan password"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select
                                        name="status"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        <option value="1">Aktif</option>
                                        <option value="0" selected>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pekerja</label>
                                    <input
                                        type="text"
                                        name="nama_pekerja"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                        placeholder="Masukkan nama pekerja"
                                        required>
                                </div>
                            </div>

                            <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-gray-200">
                                <button
                                    type="button"
                                    @click="showModal = false"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                    Batal
                                </button>
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Branch Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($cabang as $cbg)
                    <a
                        href="{{ route('cabang.show', $cbg->id) }}"
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 bg-gradient-to-r from-green-100 to-teal-100 p-3 rounded-lg">
                                    <img src="{{ asset('asset/farmericon.png') }}" alt="Cabang" class="w-8 h-8" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $cbg->nama }}</h3>
                                    <p class="text-sm text-gray-500 truncate">{{ $cbg->email }}</p>
                                    <div class="mt-2 flex items-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $cbg->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $cbg->status ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
                            <div class="text-sm text-gray-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ Str::limit($cbg->lokasi, 25) }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($cabang->hasPages())
                <div class="mt-8 px-4 py-3 bg-white rounded-lg shadow-sm border border-gray-200">
                    {{ $cabang->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

@include('master.footer')

@endsection
