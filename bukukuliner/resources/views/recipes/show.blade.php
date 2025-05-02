@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $recipe->title }}</h1>

    <h2 class="font-semibold">Bahan-bahan:</h2>
    <p class="mb-4 whitespace-pre-line">{{ $recipe->ingredients }}</p>

    <h2 class="font-semibold">Langkah-langkah:</h2>
    <p class="whitespace-pre-line">{{ $recipe->steps }}</p>

    @auth
    <form action="{{ route('bookmark.store', $recipe->id) }}" method="POST" class="mt-6">
        @csrf
        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Simpan ke Bookmark</button>
    </form>
@else
    <a href="{{ route('login') }}" class="bg-blue-500 text-black px-4 py-2 rounded mt-6 inline-block">Login untuk Bookmark</a>
@endauth
</div>
@endsection
