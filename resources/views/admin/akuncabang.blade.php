@extends('master.public')
@section('title', 'Akun Cabang')
@section('content')

    @include('master.navbar')

    <!-- Konten Utama -->
    <div class="container mx-auto px-4 py-6">
        <div x-data="{ showModal: false}">
        <!-- Search dan Tambah Data -->
        <div class="flex justify-between items-center mb-6">
            <!-- Search Bar -->
            <form action="" method="GET">
                @if (Session::has('message'))
                    <p class="mb-4 text-green-600 bg-green-100 border border-green-300 rounded px-4 py-2">
                        {{ Session::get('message') }}
                    </p>
                @endif
                <div class="flex items-center space-x-2 mb-4">
                    <input
                        type="text"
                        name="nama"
                        value="{{ $nama }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="Cari akun"
                        aria-label="Search title"
                        aria-describedby="button-addon2"
                    >
                    <button
                        type="submit"
                        id="button-addon2"
                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition"
                    >
                        Search
                    </button>
                </div>
            </form>

            <!-- Tombol Tambah Data -->
            <button
                @click="showModal = true"
                class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 transition">
            Tambah Data
            </button>
        </div>

            <!-- Modal Tambah Cabang -->
            <div
                x-show="showModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 bg-black/50 z-40 flex items-center justify-center"
                x-cloak>
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl relative z-50 border-2 border-blue-400">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Tambah Data Akun Cabang</h2>
                        <button @click="showModal = false" class="text-2xl font-bold text-gray-500 hover:text-red-600">&times;</button>

                    </div>
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.akuncabang.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm">Nama Cabang</label>
                                <input type="text" name="nama" class="w-full border rounded px-3 py-2" placeholder="Masukkan nama cabang" required>
                            </div>
                            <div>
                                <label class="block text-sm">Nomor Handphone</label>
                                <input name="no_hp" class="w-full border rounded px-3 py-2" placeholder="Masukkan nomor handphone" required>
                            </div>
                            <div>
                                <label class="block text-sm">Email</label>
                                <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Masukkan email" required>
                            </div>
                            <div>
                                <label class="block text-sm">Lokasi Lahan</label>
                                <input type="text" name="lokasi" class="w-full border rounded px-3 py-2" placeholder="Masukkan lokasi lahan" required>
                            </div>
                            <div>
                                <label class="block text-sm">Password</label>
                                <input type="password" name="password" class="w-full border rounded px-3 py-2" placeholder="Masukkan password" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm">Nama Pekerja</label>
                                <input type="text" name="nama_pekerja" class="w-full border rounded px-3 py-2" placeholder="Masukkan nama" required>
                            </div>
                            <div>
                                <label for="status" class="block text-sm">Status</label>
                                <select name="status" id="status" class="w-full border rounded px-3 py-2">
                                    <option value="1">Aktif</option>
                                    <option value="0" selected>Tidak Aktif</option>
                                </select>
                            </div>

                        </div>

                        <div class="flex justify-end mt-6 space-x-2">
                            <button type="button" @click="showModal = false" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Akun Cabang -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cabang as $cbg)
                <a href="{{ route('cabang.show', $cbg->id) }}"
                    class="cursor-pointer flex items-center bg-white shadow-md rounded-lg p-4 space-x-4 hover:bg-gray-100 transition">
                    <img src="{{ asset('asset/farmericon.png') }}" alt="Cabang" class="w-12 h-12 rounded-full" />
                    <div class="flex-1">
                        <h2 class="font-bold text-lg text-green-800">{{ $cbg->nama }}</h2>
                        <p class="text-gray-500 text-sm">{{ $cbg->email }}</p>
                    </div>
                    <div>
                        <span class="w-3 h-3 rounded-full inline-block {{ $cbg->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                    </div>
                </a>
            @endforeach

        </div>
        {{-- Pagination --}}
        <div class="mt-4">
            {{ $cabang->links() }}
        </div>

@endsection
