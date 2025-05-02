@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Bookmark Saya</h1>

@if($bookmarks->count())
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($bookmarks as $bookmark)
        <div class="bg-white p-4 rounded shadow">
            @if($bookmark->recipe && $bookmark->recipe->image)
                <img src="{{ asset('storage/image/' . $bookmark->recipe->image) }}" alt="{{ $bookmark->recipe->title }}" class="w-full h-40 object-cover rounded mb-2">
            @endif
            <h2 class="font-bold text-lg">{{ $bookmark->recipe->title ?? '-' }}</h2>
            <a href="{{ route('recipe.show', $bookmark->recipe->id) }}" class="text-blue-500">Lihat Resep</a>
            <form action="{{ route('bookmark.remove', $bookmark->recipe->id) }}" method="POST" class="inline-block mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-black px-3 py-1 rounded">Hapus</button>
            </form>
        </div>
    @endforeach
</div>
@else
<p>Belum ada resep yang disimpan.</p>
@endif
@endsection
