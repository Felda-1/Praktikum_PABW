@extends('layouts.base')
@section('title', '404')
@section('body')
<div class="min-h-screen flex flex-col items-center justify-center gap-4 text-center p-6">
    <p class="text-6xl font-extrabold font-display text-[#d4a830]">404</p>
    <p class="text-lg font-semibold text-neutral-800">Halaman tidak ditemukan</p>
    <a href="/" class="inline-flex items-center justify-center gap-2 bg-finbisku-gold-400 text-white px-4 py-2 rounded-btn text-sm font-bold font-display hover:bg-finbisku-gold-500 hover:shadow-md transition-all">Kembali ke beranda</a>
</div>
@endsection
