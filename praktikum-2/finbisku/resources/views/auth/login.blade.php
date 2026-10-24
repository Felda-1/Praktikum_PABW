@extends('layouts.auth')
@section('title', 'Masuk')
@section('content')
<h1 class="text-2xl font-bold font-display text-neutral-800">Masuk</h1>
<p class="text-sm text-neutral-500 mt-1 mb-6">Masuk ke akun FINBISKU Anda.</p>
<form data-demo data-redirect="{{ route('dashboard') }}" class="space-y-5">
    <x-field label="Email" name="email" type="email" placeholder="nama@usaha.id" />
    <x-field label="Kata sandi" name="password" type="password" placeholder="Kata sandi" />
    <x-button type="submit" :full="true">Masuk</x-button>
</form>
<p class="mt-6 text-center text-sm text-neutral-500">
    <a href="{{ route('password.request') }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Lupa kata sandi?</a><br>
    Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Daftar</a><br>
    <a href="{{ route('admin.dashboard') }}" class="text-xs text-neutral-500 hover:text-neutral-800">Demo: buka panel admin</a>
</p>
@endsection
