@extends('layouts.app')

@section('content')
<div class="mb-8">
    <form action="{{ route('home') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Cari resep..." 
            class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-400 focus:outline-none transition"
        />

        <select name="category" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-400 focus:outline-none transition">
            <option value="">-- Semua Kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->category }}" {{ request('category') == $cat->category ? 'selected' : '' }}>
                    {{ $cat->category }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg w-full font-semibold transition">
            <i class="fas fa-search mr-1"></i> Cari
        </button>
    </form>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    @forelse($recipes as $recipe)
    <div class="bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition flex flex-col">
        @if($recipe->image)
        <img src="{{ asset('storage/image/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover rounded-lg mb-3">
        @endif
        <h2 class="font-bold text-lg mb-1 text-gray-800">{{ $recipe->title }}</h2>
        <p class="text-sm text-green-600 mb-2">{{ $recipe->category }}</p>
        <a href="{{ route('recipe.show', $recipe->id) }}" class="mt-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-center transition font-medium">
            Lihat Resep
        </a>
    </div>
    @empty
        <div class="col-span-3 text-center text-gray-500">
            Tidak ada resep ditemukan.
        </div>
    @endforelse
</div>

@endsection
