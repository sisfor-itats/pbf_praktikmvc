@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Akun Baru</h1>
<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Nama" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <input type="email" name="email" placeholder="Email" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <input type="password" name="password" placeholder="Password" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="border p-2 rounded w-full" required>
    </div>
    <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded">Daftar</button>
</form>
<p class="mt-4">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500">Login di sini</a></p>
@endsection