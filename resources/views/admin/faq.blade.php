@extends('master.public')
@section('title', 'FAQ')
@section('content')

@include('master.navbar')

<h1>Daftar FAQ</h1>

@if($isAdmin)
<a href="{{ route('admin.faq.create') }}">+ Tambah FAQ</a>
@endif

@foreach ($faqs as $faq)
    <div>
        <strong>{{ $faq->question }}</strong>
        <p>{{ $faq->answer }}</p>
        @if($isAdmin)
            <a href="{{ route('admin.faq.edit', $faq->id) }}">Edit</a>
            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        @endif
    </div>
@endforeach

@endsection
