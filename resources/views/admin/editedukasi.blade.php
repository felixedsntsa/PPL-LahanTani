@extends('master.public')
@section('title', 'Edit Edukasi')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Edit Materi
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Perbarui Materi Edukasi</h1>
            <p class="text-gray-500 mt-2">Update konten edukasi untuk memberikan informasi terbaik</p>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden p-6 md:p-8">
            <form action="{{ route('admin.edukasi.update', $edukasi->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Judul Field -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Materi</label>
                        <div class="relative">
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $edukasi->judul) }}" required
                                   class="block w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube URL Field -->
                    <div>
                        <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-1">URL Video YouTube</label>
                        <div class="relative">
                            <input type="text" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $edukasi->youtube_url) }}" required
                                   class="block w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Penjelasan Field -->
                <div class="mt-6">
                    <label for="penjelasan" class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Materi</label>
                    <textarea name="penjelasan" id="penjelasan" rows="6" required
                              class="block w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">{{ old('penjelasan', $edukasi->penjelasan) }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row justify-end gap-4">
                    <a href="{{ route('admin.edukasi.index') }}" class="inline-flex justify-center items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit" id="submitBtn"
                            class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('master.footer')

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Konfirmasi Perubahan',
                text: "Anda yakin ingin menyimpan perubahan pada materi edukasi ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10B981',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading indicator
                    Swal.fire({
                        title: 'Menyimpan...',
                        html: 'Sedang menyimpan perubahan materi edukasi',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit the form after confirmation
                    form.submit();
                }
            });
        });

        // Show success message if exists
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#10B981',
                timer: 3000
            });
        @endif

        // Show error message if exists
        @if($errors->any())
            Swal.fire({
                title: 'Gagal!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonColor: '#EF4444'
            });
        @endif
    });
</script>

@endsection
