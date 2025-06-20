@extends('master.public2')
@section('title', 'Login')
@section('content')

<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('asset/plantmelon.jpg');">
    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/40"></div>
    <!-- Glass container -->
    <div class="glass-container w-full max-w-md p-8 sm:p-10 rounded-2xl backdrop-blur-md border bg-white/50 border-white/20 shadow-2xl mx-4 transition-all duration-500 hover:shadow-green-500/20 hover:border-green-400/30">
        <!-- Logo and title -->
        <div class="flex flex-col items-center mb-8">
            <img src="asset/LahanTani.png" alt="LahanTani Logo" class="w-24 h-24 object-contain mb-4">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-teal-600">
                LahanTani
            </h1>
            <p class="text-black mt-2">Sistem Manajemen Lahan Pertanian</p>
        </div>

        <!-- Login form -->
        <form id="loginForm" method="POST" action="{{ route('login.proses') }}" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-black">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="email@contoh.com"
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        required
                        autofocus
                    >
                </div>
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-black">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        required
                    >
                </div>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                id="loginButton"
                class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 transform hover:scale-[1.02]"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Masuk
            </button>
            <!-- Register Link -->
            <p class="text-sm text-center text-gray-800 mt-4">
                Belum punya akun? <a href="{{ route('cabang.register.form') }}" class="text-green-600 hover:text-green-700 font-medium">Daftar Sekarang</a>
            </p>
        </form>
    </div>
</div>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const loginButton = document.getElementById('loginButton');

        // Handle session messages with SweetAlert
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ session('error') }}',
                confirmButtonColor: '#dc2626',
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#16a34a',
                timer: 3000,
                timerProgressBar: true,
                background: '#f8fafc',
                iconColor: '#16a34a'
            });
        @endif

        // Form submission handler
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            // Client-side validation
            if (!email || !password) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Email dan password harus diisi',
                    confirmButtonColor: '#d97706'
                });
                return;
            }

            // Show confirmation dialog
            Swal.fire({
                title: 'Login',
                text: 'Anda yakin ingin masuk dengan data yang dimasukkan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Masuk',
                cancelButtonText: 'Batal',
                backdrop: true,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    loginButton.disabled = true;
                    loginButton.innerHTML = `
                        <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    `;

                    // Submit the form
                    loginForm.submit();
                }
            });
        });
    });
</script>

<style>
    .glass-container {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    @media (max-width: 640px) {
        .glass-container {
            background: rgba(255, 255, 255, 0.95);
        }
    }
</style>

@endsection
