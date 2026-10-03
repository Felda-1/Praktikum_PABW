@extends('layouts.public')
@section('title', 'Blog usaha')
@section('content')
<div class="container mx-auto px-4 py-10"><div class="max-w-3xl"><a href="/public-blogs" class="inline-flex items-center justify-center gap-2 border border-neutral-200 bg-white text-neutral-600 px-4 py-2 rounded-btn text-sm font-semibold font-display hover:bg-neutral-100 transition-all">&larr; Kembali</a><article class="mt-5 bg-white border border-neutral-200 rounded-card p-6"><h1 class="text-3xl font-extrabold font-display text-neutral-800">Cerita dari dapur Warung Bu Sari</h1><p class="mt-1 text-sm text-neutral-500">Warung Makan Bu Sari &middot; Kuliner &middot; Blog #{{ $id }}</p><div class="mt-5 space-y-4 text-neutral-600 leading-relaxed"><p>Cerita usaha ini masih contoh. Di versi lengkap, pemilik usaha menulis kisah dan fotonya sendiri sebagai sarana promosi.</p></div></article></div></div>
@endsection
