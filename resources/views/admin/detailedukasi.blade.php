@extends('master.public')
@section('title', 'Detail Edukasi')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">{{ $edukasi->judul }}</h1>
            <p class="text-gray-600 mt-1">Detail konten edukasi</p>
        </div>

        <!-- Video Embed -->
        <div class="aspect-w-16 aspect-h-9 mb-6">
            <iframe src="{{ $edukasi->youtube_url }}" frameborder="0" allowfullscreen class="w-full h-full"></iframe>
        </div>

        <!-- Content Section -->
        <div class="prose lg:prose-xl">
            <h2 class="text-xl font-semibold text-gray-800">Penjelasan</h2>
            <p class="text-gray-600">{{ $edukasi->penjelasan }}</p>
        </div>
    </div>
</div>

@include('master.footer')

@endsection
