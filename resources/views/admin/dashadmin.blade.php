@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

    @include('master.navbar')

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-green-50 to-white">
        <div class="container mx-auto px-6 py-16 md:py-24 flex flex-col md:flex-row items-center justify-between gap-12">
            <!-- Text Content -->
            <div class="max-w-2xl order-2 md:order-1" data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-green-800">Lahan<span class="font-extrabold">Tani</span></span><br>
                    <span class="text-gray-800">Manajemen Budidaya Melon</span><br>
                    <span class="text-green-600 font-medium">Cabang Anda</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Platform terintegrasi canggih untuk memantau, menganalisis, dan mengoptimalkan produksi melon di seluruh cabang perusahaan Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('admin.laporan') }}" class="px-8 py-3.5 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        Dashboard Pemantauan
                    </a>
                    <a href="{{ route('admin.hasilpenjualan.index') }}" class="px-8 py-3.5 border border-green-600 text-green-700 font-medium rounded-lg hover:bg-green-50 transition-all duration-300 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                        </svg>
                        Grafik Pendapatan
                    </a>
                </div>

                <!-- Stats Preview -->
                <div class="mt-12 grid grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                        <div class="text-green-600 font-bold text-2xl">24/7</div>
                        <div class="text-gray-500 text-sm">Pemantauan dan Hasil Panen</div>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                        <div class="text-green-600 font-bold text-2xl">100%</div>
                        <div class="text-gray-500 text-sm">Grafik Pendapatan Akurat</div>
                    </div>
                </div>
            </div>

            <!-- Image Content -->
            <div class="relative order-1 md:order-2" data-aos="fade-left">
                <div class="relative z-10 w-full max-w-xl rounded-2xl shadow-2xl border-8 border-white transform rotate-1 hover:rotate-0 transition-all duration-500 overflow-hidden">
                    <img src="/asset/hero-melon.jpg" alt="Dashboard Preview" class="w-full h-auto">
                    <!-- Overlay effect -->
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/10 to-transparent"></div>
                </div>

                <!-- Decorative elements -->
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-green-100 rounded-full opacity-70 animate-pulse"></div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-yellow-100 rounded-full opacity-70 animate-pulse" style="animation-delay: 1s;"></div>
            </div>
        </div>

        <!-- Wave divider at bottom -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="fill-green-100"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="fill-green-50"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="fill-white"></path>
            </svg>
        </div>
    </section>

    {{-- Fitur Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 mt-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Dashboard Admin</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Manajemen lengkap untuk sistem budidaya melon</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">
                <!-- Kartu 1 - Pemantauan -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="p-1 bg-gradient-to-r from-amber-400 to-amber-500"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-14 h-14 bg-amber-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-amber-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Pemantauan</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">Pantau kondisi lahan melon secara real-time</p>
                        <a href="{{ route('admin.laporan') }}" class="mt-auto inline-flex items-center text-amber-600 font-medium hover:text-amber-700 transition-colors text-sm">
                            Akses Fitur
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 2 - Jadwal -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="p-1 bg-gradient-to-r from-rose-400 to-rose-500"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-14 h-14 bg-rose-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-rose-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Jadwal</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">Kelola jadwal kunjungan dan perawatan</p>
                        <a href="{{ route('admin.jadwal.index') }}" class="mt-auto inline-flex items-center text-rose-600 font-medium hover:text-rose-700 transition-colors text-sm">
                            Akses Fitur
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 3 - Panen -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="p-1 bg-gradient-to-r from-blue-400 to-blue-500"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Hasil Panen</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">Analisis data hasil panen melon</p>
                        <a href="{{ route('admin.hasilpanen') }}" class="mt-auto inline-flex items-center text-blue-600 font-medium hover:text-blue-700 transition-colors text-sm">
                            Akses Fitur
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 4 - Keuangan -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="p-1 bg-gradient-to-r from-purple-400 to-purple-500"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Keuangan</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">Laporan keuangan dan analisis profit</p>
                        <a href="{{ route('admin.hasilpenjualan.index') }}" class="mt-auto inline-flex items-center text-purple-600 font-medium hover:text-purple-700 transition-colors text-sm">
                            Akses Fitur
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 5 - Edukasi -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="p-1 bg-gradient-to-r from-emerald-400 to-emerald-500"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-14 h-14 bg-emerald-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-emerald-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Edukasi</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">Kelola materi edukasi budidaya</p>
                        <a href="{{ route('admin.edukasi.index') }}" class="mt-auto inline-flex items-center text-emerald-600 font-medium hover:text-emerald-700 transition-colors text-sm">
                            Akses Fitur
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 6 - FAQ -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="p-1 bg-gradient-to-r from-indigo-400 to-indigo-500"></div>
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-14 h-14 bg-indigo-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-indigo-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">FAQ</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">Kelola pertanyaan yang sering diajukan</p>
                        <a href="{{ route('admin.faq.index') }}" class="mt-auto inline-flex items-center text-indigo-600 font-medium hover:text-indigo-700 transition-colors text-sm">
                            Akses Fitur
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Keuntungan Section --}}
    <section class="py-20 bg-gradient-to-r from-green-700 to-green-900 text-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2" data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-8">Transformasi Digital untuk Budidaya Melon</h2>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Pemantauan Terpusat</h3>
                                <p class="text-green-100">Pantau semua lahan melon dari satu dashboard terintegrasi.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Efisiensi Operasional</h3>
                                <p class="text-green-100">Optimalkan sumber daya dengan perencanaan yang terdata.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Keputusan Data-driven</h3>
                                <p class="text-green-100">Analisis berbasis data untuk meningkatkan produktivitas.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Kolaborasi Tim</h3>
                                <p class="text-green-100">Sistem terintegrasi untuk koordinasi seluruh tim lapangan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2" data-aos="fade-left">
                    <div class="relative">
                        <img src="/asset/farmer_man.png" alt="Petani Melon" class="rounded-xl shadow-2xl border-8 border-white/20 w-full max-w-lg mx-auto">
                        <div class="absolute -bottom-6 -left-1 w-32 h-32 bg-yellow-200/10 rounded-full"></div>
                        <div class="absolute -top-6 -right-1 w-24 h-24 bg-white/10 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoni --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Kata Pengguna Kami?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Dengarkan pengalaman nyata dari petani dan manajer budidaya melon</p>
            </div>

            <!-- Slider main container -->
            <div class="swiper testimonial-swiper" data-aos="fade-up" data-aos-delay="200">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper pb-12">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative h-full">
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-yellow-400 rounded-t-xl"></div>
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="flex-shrink-0">
                                    <img src="/asset/testiavatar.png" class="w-20 h-20 rounded-full border-4 border-green-100 shadow-md" alt="Bapak Felix">
                                </div>
                                <div class="text-center md:text-left">
                                    <div class="text-yellow-500 mb-2">
                                        ★ ★ ★ ★ ★
                                    </div>
                                    <blockquote class="text-lg italic text-gray-700 mb-4">
                                        "LahanTani telah mengubah cara kami mengelola budidaya melon. Dengan sistem pemantauan real-time dan analisis data, kami bisa meningkatkan hasil panen hingga 30% dalam satu musim."
                                    </blockquote>
                                    <div>
                                        <p class="font-bold text-gray-800">Bapak Almas</p>
                                        <p class="text-sm text-gray-600">Petani Melon Cabang Rambipuji</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative h-full">
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-500 to-green-400 rounded-t-xl"></div>
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="flex-shrink-0">
                                    <img src="/asset/ibusiti.png" class="w-20 h-20 rounded-full border-4 border-green-100 shadow-md" alt="Ibu Siti">
                                </div>
                                <div class="text-center md:text-left">
                                    <div class="text-yellow-500 mb-2">
                                        ★ ★ ★ ★ ☆
                                    </div>
                                    <blockquote class="text-lg italic text-gray-700 mb-4">
                                        "Sistem penjadwalan dari LahanTani sangat membantu tim kami mengorganisir kunjungan ke lahan. Tidak ada lagi yang terlewat dan semua tercatat rapi."
                                    </blockquote>
                                    <div>
                                        <p class="font-bold text-gray-800">Ibu Dini</p>
                                        <p class="text-sm text-gray-600">Petani Melon Cabang Patrang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative h-full">
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-purple-500 to-blue-400 rounded-t-xl"></div>
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="flex-shrink-0">
                                    <img src="/asset/bapakagus.png" class="w-20 h-20 rounded-full border-4 border-green-100 shadow-md" alt="Bapak Agus">
                                </div>
                                <div class="text-center md:text-left">
                                    <div class="text-yellow-500 mb-2">
                                        ★ ★ ★ ★ ★
                                    </div>
                                    <blockquote class="text-lg italic text-gray-700 mb-4">
                                        "Laporan keuangan yang otomatis sangat memudahkan kami. Sekarang kami bisa melihat profitabilitas setiap lahan dengan mudah dan membuat keputusan lebih cepat."
                                    </blockquote>
                                    <div>
                                        <p class="font-bold text-gray-800">Bapak Tio</p>
                                        <p class="text-sm text-gray-600">Petani Melon Cabang Mangli</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next hidden md:flex after:text-green-600"></div>
                <div class="swiper-button-prev hidden md:flex after:text-green-600"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    @include('master.footer')

    {{-- CSS & JS untuk Swiper --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        .testimonial-swiper {
            padding: 0 20px;
        }
        .swiper-slide {
            height: auto;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        .swiper-slide-active {
            opacity: 1;
        }
        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: #ddd;
            opacity: 1;
        }
        .swiper-pagination-bullet-active {
            background: #4CAF50;
        }
        .swiper-button-next,
        .swiper-button-prev {
            background-color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testimonialSwiper = new Swiper('.testimonial-swiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 1.5,
                    },
                    1024: {
                        slidesPerView: 2,
                    }
                }
            });
        });
    </script>

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

@endsection
