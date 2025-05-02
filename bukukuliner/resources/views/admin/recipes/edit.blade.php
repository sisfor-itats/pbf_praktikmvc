@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Resep</h1>

<form action="{{ route('admin.recipes.update', $recipe->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <input type="text" name="title" value="{{ $recipe->title }}" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <input type="file" name="image" class="border p-2 rounded w-full">
    </div>
    <div>
        <input type="text" name="category" value="{{ $recipe->category }}" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <textarea name="ingredients" class="border p-2 rounded w-full" rows="4" required>{{ $recipe->ingredients }}</textarea>
    </div>
    <div>
        <textarea name="steps" class="border p-2 rounded w-full" rows="6" required>{{ $recipe->steps }}</textarea>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
