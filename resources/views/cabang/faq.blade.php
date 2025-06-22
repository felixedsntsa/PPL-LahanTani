@extends('master.public')
@section('title', 'FAQ Cabang')
@section('content')

@include('master.navbar2')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- FAQ Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Pertanyaan Umum</h1>
            <p class="text-gray-600">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
        </div>

        <!-- FAQ Accordion -->
        <div class="space-y-4">
            @foreach ($faqs as $faq)
                <div x-data="{ open: false }" class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 transition-all duration-200">
                    <!-- Question -->
                    <button @click="open = !open"
                            class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $faq->question }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 text-gray-500 transition-transform duration-200"
                             :class="{ 'transform rotate-180': open }"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Answer -->
                    <div x-show="open" x-collapse
                         class="px-6 pb-4 text-gray-700 border-t border-gray-100">
                        <div class="prose prose-green max-w-none text-justify">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($faqs->isEmpty())
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada FAQ tersedia</h3>
                <p class="mt-1 text-gray-500">Pertanyaan yang sering diajukan akan muncul di sini</p>
            </div>
        @endif
    </div>
</div>

@include('master.footer2')

<!-- Alpine JS for accordion functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    /* Smooth accordion transitions */
    [x-cloak] { display: none !important; }
    .prose-green a {
        color: #10B981;
    }
    .prose-green a:hover {
        color: #059669;
    }
</style>

@endsection
