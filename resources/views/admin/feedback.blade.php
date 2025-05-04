@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

@include('master.navbar')

<div class="container mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Beri Feedback untuk Laporan</h2>

    <div class="mb-4">
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</p>
        <p><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>
    </div>

    <form action="{{ route('admin.laporan.feedback.submit', $laporan->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-medium mb-1">Feedback</label>
            <textarea name="feedback" rows="5" class="w-full border rounded p-2">{{ old('feedback', $laporan->feedback) }}</textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Kirim</button>
    </form>
</div>

@endsection
