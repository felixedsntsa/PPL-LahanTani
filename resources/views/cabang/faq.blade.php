@extends('master.public')
@section('title', 'FAQ Cabang')
@section('content')

@include('master.navbar2')

<div class="min-h-screen container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Daftar FAQ</h2>

    @foreach ($faqs as $faq)
        <div class="border p-4 mb-3 rounded">
            <h3 class="font-bold">{{ $faq->question }}</h3>
            <p>{{ $faq->answer }}</p>
        </div>
    @endforeach
</div>

@include('master.footer2')

@endsection
