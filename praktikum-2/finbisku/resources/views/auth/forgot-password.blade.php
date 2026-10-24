@extends('layouts.auth')
@section('title', 'Lupa kata sandi')
@section('content')
<h1 class="text-2xl font-bold font-display text-neutral-800">Lupa kata sandi</h1>
<p class="text-sm text-neutral-500 mt-1 mb-6">Masukkan email untuk menerima tautan pengaturan ulang.</p>
<form data-demo class="space-y-5">
    <x-field label="Email" name="email" type="email" placeholder="nama@usaha.id" />
    <x-button type="submit" :full="true">Kirim tautan</x-button>
</form>
<p class="mt-6 text-center text-sm text-neutral-500"><a href="{{ route('login') }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Kembali ke halaman masuk</a></p>
@endsection
