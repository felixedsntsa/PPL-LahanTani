@extends('master.public')
@section('title', 'Tambah Edukasi')
@section('content')

@include('master.navbar')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl ">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 sm:p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Materi Edukasi</h2>
                <a href="{{ route('admin.edukasi.index') }}" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

            <form method="POST" action="{{ route('admin.edukasi.store') }}" id="educationForm" class="space-y-6">
                @csrf

                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Materi</label>
                    <div class="relative">
                        <input type="text" name="judul" id="judul"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                            value="{{ old('judul') }}"
                            placeholder="Masukkan judul materi edukasi"
                            required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-1">URL Video YouTube</label>
                    <div class="relative">
                        <input type="url" name="youtube_url" id="youtube_url"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                            value="{{ old('youtube_url') }}"
                            placeholder="https://www.youtube.com/watch?v=..."
                            required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z" />
                            </svg>
                        </div>
                    </div>
                    @error('youtube_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Thumbnail Video</label>
                        <div class="relative bg-gray-100 rounded-lg overflow-hidden border border-gray-200 w-full max-w-md">
                            <img id="thumbnail-preview" class="w-full h-auto object-cover" src="" alt="Thumbnail video">
                            <div id="thumbnail-placeholder" class="absolute inset-0 flex flex-col items-center justify-center p-4 text-gray-500 bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span class="text-center text-sm">Thumbnail akan muncul setelah URL dimasukkan</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="penjelasan" class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Materi</label>
                    <textarea name="penjelasan" id="penjelasan" rows="6"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                            placeholder="Tulis penjelasan lengkap tentang materi ini"
                            required>{{ old('penjelasan') }}</textarea>
                    @error('penjelasan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('admin.edukasi.index') }}" class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Batal
                    </a>
                    <button type="submit" id="submitBtn" class="px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 flex items-center">
                        <svg id="spinner" class="hidden -ml-1 mr-2 h-4 w-4 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Simpan Materi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('master.footer')

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function getYouTubeID(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('youtube_url');
        const preview = document.getElementById('thumbnail-preview');
        const placeholder = document.getElementById('thumbnail-placeholder');

        function updateThumbnail() {
            const videoId = getYouTubeID(input.value);
            if (videoId) {
                // Try to get max resolution thumbnail first
                preview.src = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
                preview.onerror = function() {
                    // Fallback to high quality thumbnail if maxres doesn't exist
                    this.src = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
                };
                preview.style.display = 'block';
                placeholder.style.display = 'none';
            } else {
                preview.style.display = 'none';
                placeholder.style.display = 'flex';
            }
        }

        input.addEventListener('input', updateThumbnail);
        updateThumbnail(); // for edit mode

        // Form submission with SweetAlert
        const form = document.getElementById('educationForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const spinner = document.getElementById('spinner');

            submitBtn.disabled = true;
            spinner.classList.remove('hidden');

            // Simulate processing (replace with actual form submission)
            setTimeout(() => {
                spinner.classList.add('hidden');
                submitBtn.disabled = false;

                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Materi edukasi berhasil ditambahkan',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3b82f6',
                    customClass: {
                        popup: 'rounded-xl',
                        confirmButton: 'px-4 py-2 rounded-lg'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }, 1500);
        });
    });
</script>

@endsection
