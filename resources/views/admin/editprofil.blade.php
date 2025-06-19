@extends('master.public')
@section('title', 'Ubah Profil')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Profile Edit Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 transform transition-all hover:shadow-2xl">
            <!-- Profile Header with Gradient -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 p-6 text-white relative">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-2 border-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Ubah Profil</h2>
                        <p class="text-green-100">Perbarui informasi profil akun Anda</p>
                    </div>
                </div>
            </div>

            <!-- Profile Edit Body -->
            <div class="p-6 bg-white/90 backdrop-blur-sm">

                <!-- SweetAlert for Error Messages -->
                @if($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: `<ul class="text-center">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                            background: '#fef2f2',
                            iconColor: '#ef4444'
                        });
                    });
                </script>
                @endif

                <form id="editProfileForm" action="{{ route('profil.update') }}" method="POST">
                    @csrf

                    <div class="space-y-6">
                        @php
                            $fields = [
                                [
                                    'name' => 'username',
                                    'label' => 'Username',
                                    'type' => 'text',
                                    'value' => old('username', $user->username),
                                    'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
                                ],
                                [
                                    'name' => 'email',
                                    'label' => 'Email',
                                    'type' => 'email',
                                    'value' => old('email', $user->email),
                                    'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                                ],
                                [
                                    'name' => 'password',
                                    'label' => 'Password',
                                    'type' => 'password',
                                    'value' => '',
                                    'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                                    'placeholder' => 'Kosongkan jika tidak ingin diubah'
                        ],
                                [
                                    'name' => 'password_confirmation',
                                    'label' => 'Konfirmasi Password',
                                    'type' => 'password',
                                    'value' => '',
                                    'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                                    'placeholder' => 'Kosongkan jika tidak ingin diubah'
                                ]
                            ];
                        @endphp

                        @foreach ($fields as $field)
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                <label class="w-full sm:w-1/3 font-medium text-gray-700 flex items-center">
                                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $field['icon'] }}" />
                                        </svg>
                                    </div>
                                    {{ $field['label'] }}
                                </label>
                                <div class="w-full sm:w-2/3">
                                    <div class="relative">
                                        <input
                                            type="{{ $field['type'] }}"
                                            name="{{ $field['name'] }}"
                                            value="{{ $field['value'] }}"
                                            placeholder="{{ $field['placeholder'] ?? '' }}"
                                            class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 pl-12 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Divider -->
                    <div class="my-6 relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="px-2 bg-white text-sm text-gray-500">Formulir Perubahan</span>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                        <a href="{{ url('/profiladmin') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('master.footer')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Form Submission Handling -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editProfileForm');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Konfirmasi Perubahan',
                    text: 'Apakah Anda yakin ingin menyimpan perubahan profil?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal',
                    backdrop: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form if user confirms
                        form.submit();
                    }
                });
            });
        }
    });
</script>

@endsection
