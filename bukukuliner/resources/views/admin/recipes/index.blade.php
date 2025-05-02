@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Resep</h1>

<a href="{{ route('admin.recipes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded mb-4 inline-block">Tambah Resep</a>

<form action="{{ route('logout') }}" method="POST" class="inline ml-2">
    @csrf
    <button type="submit" class="bg-red-600 text-black px-4 py-2 rounded">Logout</button>
</form>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<table class="w-full table-auto">
    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2">Gambar</th>
            <th class="border p-2">Judul</th>
            <th class="border p-2">Kategori</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recipes as $recipe)
        <tr>
            <td class="border p-2">
                @if($recipe->image)
                    <img src="{{ asset('storage/image/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-24 h-16 object-cover rounded">
                @else
                <img src="{{ asset('storage/image/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-24 h-16 object-cover rounded">
                @endif
            </td>
            <td class="border p-2">{{ $recipe->title }}</td>
            <td class="border p-2">{{ $recipe->category }}</td>
            <td class="border p-2">
                <a href="{{ route('admin.recipes.edit', $recipe->id) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('admin.recipes.destroy', $recipe->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
