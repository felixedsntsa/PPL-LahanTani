@extends('master.public')
@section('title', 'Edukasi Cabang')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-3">Materi Edukasi Cabang</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">Temukan berbagai materi edukasi untuk meningkatkan pengetahuan dan keterampilan Anda</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($edukasis as $item)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
            <!-- YouTube Thumbnail -->
            <div class="relative pb-[56.25%] h-0 overflow-hidden">
                <iframe class="absolute top-0 left-0 w-full h-full"
                        src="{{ $item->youtube_url }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $item->judul }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ $item->penjelasan }}</p>

                <!-- Read More Button -->
                <div class="mt-4">
                    <a href="{{ route('cabang.edukasi.show', $item->id) }}"
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-300">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination (optional) -->
    @if($edukasis->hasPages())
    <div class="mt-12">
        {{ $edukasis->links() }}
    </div>
    @endif
</div>

@include('master.footer2')

@endsection
