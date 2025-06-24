@extends('master.public')
@section('title', 'Detail Edukasi Cabang')
@section('content')

@include('master.navbar2')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-3">Detail Edukasi Cabang</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">Temukan informasi lebih lanjut tentang materi edukasi ini.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- YouTube Thumbnail -->
            <div class="relative pb-[56.25%] h-0 overflow-hidden">
                <iframe class="absolute top-0 left-0 w-full h-full"
                        src="{{ $edukasi->youtube_url }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Judul dan Deskripsi -->
                <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $edukasi->judul }}</h3>
                <p class="text-gray-600 mb-4 text-justify">{{ $edukasi->penjelasan }}</p>
            </div>
        </div>
    </div>
</div>

@include('master.footer2')

@endsection
