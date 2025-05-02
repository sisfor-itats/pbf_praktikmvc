@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Login</h1>
@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf
    <div>
        <input type="email" name="email" placeholder="Email" class="border p-2 rounded w-full" required>
    </div>
    <div>
        <input type="password" name="password" placeholder="Password" class="border p-2 rounded w-full" required>
    </div>
    <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Login</button>
</form>
<p class="mt-4">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar di sini</a></p>
@endsection