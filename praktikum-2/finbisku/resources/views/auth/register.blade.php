@extends('layouts.auth')
@section('title', 'Daftar')
@section('content')
<h1 class="text-2xl font-bold font-display text-neutral-800">Daftar</h1>
<p class="text-sm text-neutral-500 mt-1 mb-6">Buat akun untuk mulai mencatat keuangan usaha.</p>
<form data-demo data-redirect="{{ route('login') }}" class="space-y-5">
    <x-field label="Nama lengkap" name="nama" placeholder="Nama Anda" />
    <x-field label="Email" name="email" type="email" placeholder="nama@usaha.id" />
    <x-field label="Kata sandi" name="password" type="password" placeholder="Minimal 8 karakter" />
    <x-field label="Ulangi kata sandi" name="password_confirmation" type="password" placeholder="Ulangi kata sandi" />
    <x-button type="submit" :full="true">Buat akun</x-button>
</form>
<p class="mt-6 text-center text-sm text-neutral-500">Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Masuk</a></p>
@endsection
