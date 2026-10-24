@extends('layouts.base')
@section('title', '404')
@section('body')
<div class="min-h-screen flex flex-col items-center justify-center gap-4 text-center p-6">
    <p class="text-6xl font-extrabold font-display text-[#d4a830]">404</p>
    <p class="text-lg font-semibold text-neutral-800">Halaman tidak ditemukan</p>
    <x-button :href="route('home')">Kembali ke beranda</x-button>
</div>
@endsection
