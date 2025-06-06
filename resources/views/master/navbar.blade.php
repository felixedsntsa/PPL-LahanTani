{{-- Navbar --}}
<nav class="bg-[#539442]/60 py-4 shadow-lg border-b">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="/asset/melonrepo.svg" alt="" class="w-9 mr-3">
            <h1 class="text-3xl font-bold text-green-900"><a href="{{ url('/admin/dashboard') }}">LahanTani</a></h1>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-8 items-center">
        <a href="{{ route('admin.laporan') }}" class="text-black hover:text-green-900 font-medium">Pemantauan</a>
        <a href="{{ route('admin.jadwal.index') }}" class="text-black hover:text-green-900 font-medium">Jadwal Kunjungan</a>
        <a href="{{ route('admin.hasilpanen') }}" class="text-black hover:text-green-900 font-medium">Hasil Panen</a>
        <a href="{{ route('admin.hasilpenjualan.index') }}" class="text-black hover:text-green-900 font-medium">Hasil Jual</a>

        <!-- Profil Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="w-8 h-8 rounded-full flex items-center justify-center focus:outline-none">
                <img src="/asset/profilerepo.svg" alt="Profile" />
            </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50 py-2 text-sm">
            <a href="{{ route('profil') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Akun</a>
            <a href="{{ route('admin.akuncabang') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Akun Cabang</a>
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100">Logout</button>
            </form>
        </div>
    </div>
    </div>
    </div>
</nav>
