@extends('layouts.public')
@section('title', 'Kelola keuangan usaha')
@section('content')
<section class="relative overflow-hidden bg-senja-gradient text-white">
    <div class="hero-glow-1 absolute -top-32 -right-24 h-[28rem] w-[28rem] rounded-full"></div>
    <div class="hero-glow-2 absolute -bottom-40 -left-24 h-[28rem] w-[28rem] rounded-full"></div>
    <div class="container mx-auto px-4 py-20 md:py-28 relative max-w-4xl">
        <p class="inline-block rounded-full border border-white/30 bg-white/10 px-4 py-1 text-xs font-semibold font-display uppercase tracking-wider mb-6">Finansial Bisnisku</p>
        <h1 class="text-4xl md:text-6xl font-extrabold font-display leading-tight tracking-tight">Kelola keuangan usahamu dengan lebih tenang.</h1>
        <p class="mt-6 text-lg text-white/80 max-w-xl">FINBISKU membantu UMKM mencatat pemasukan dan pengeluaran, memantau saldo tiap usaha, dan belajar mengatur keuangan.</p>
        <div class="mt-10 flex flex-wrap gap-3">
            <a href="{{ route('register') }}" class="bg-finbisku-gold-400 text-white px-6 py-3 rounded-btn font-bold font-display hover:bg-finbisku-gold-500 transition-all">Daftar sekarang</a>
            <a href="{{ route('articles.index') }}" class="border border-white/40 text-white px-6 py-3 rounded-btn font-semibold font-display hover:bg-white/10 transition-all">Baca artikel</a>
        </div>
    </div>
</section>
<section class="container mx-auto px-4 py-16">
    <h2 class="text-2xl md:text-3xl font-extrabold font-display text-neutral-800 text-center">Fitur utama</h2>
    <div class="mt-10 grid gap-6 md:grid-cols-3">
        @foreach ($fitur as $item)
            <div class="bg-white border border-neutral-200 rounded-card p-6">
                <h3 class="text-lg font-bold font-display text-neutral-800">{{ $item['judul'] }}</h3>
                <p class="mt-2 text-sm text-neutral-500 leading-relaxed">{{ $item['deskripsi'] }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
