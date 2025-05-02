@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Resep Baru</h1>

<form action="{{ route('admin.recipes.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <input type="text" name="title" placeholder="Judul Resep" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <input type="file" name="image" class="border p-2 rounded w-full">
    </div>
    <div>
        <input type="text" name="category" placeholder="Kategori" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <textarea name="ingredients" placeholder="Bahan-bahan" class="border p-2 rounded w-full" rows="4" required></textarea>
    </div>
    <div>
        <textarea name="steps" placeholder="Langkah-langkah" class="border p-2 rounded w-full" rows="6" required></textarea>
    </div>
    <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Simpan</button>
</form>
@endsection
