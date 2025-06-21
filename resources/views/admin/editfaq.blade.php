@extends('master.public')
@section('title', 'Edit FAQ')
@section('content')

@include('master.navbar')

<div class="container mx-auto mt-6 max-w-lg bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit FAQ</h2>

    <form method="POST" action="{{ route('admin.faq.update', $faq->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="question" class="block font-semibold">Pertanyaan</label>
            <input type="text" name="question" id="question"
                    class="w-full border rounded p-2"
                    value="{{ old('question', $faq->question) }}" required>
            @error('question')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="answer" class="block font-semibold">Jawaban</label>
            <textarea name="answer" id="answer"
                        class="w-full border rounded p-2" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
            @error('answer')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.faq.index') }}" class="mr-4 text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>

@endsection
