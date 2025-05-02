@extends('master.public')
@section('title', 'Landing Page')
@section('content')

<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('asset/bgmelon.png');">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-white text-center px-4">
        <h1 class="text-7xl font-extrabold mb-4">Selamat Datang</h1>
        <p class="text-4xl  font-bold mb-2">di</p>
        <h2 class="text-8xl font-black italic tracking-wider mb-6 outline-text">
            LahanTani
        </h2>
        <a href="{{ url('/login') }}" class="bg-white text-black px-6 py-2 rounded-lg font-bold shadow hover:bg-gray-200 transition">Masuk</a>
    </div>
</div>

@endsection
