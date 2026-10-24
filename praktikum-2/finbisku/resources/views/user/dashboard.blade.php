@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
<x-page-header title="Dashboard" subtitle="Ringkasan contoh untuk Warung Makan Bu Sari." />

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-6">
    @foreach ($stats as $stat)
        <x-stat-card :label="$stat['label']" :value="$stat['value']" :icon="$stat['icon']" :tone="$stat['tone']" />
    @endforeach
</div>

<div class="bg-white border border-neutral-200 rounded-card p-6">
    <h2 class="font-bold font-display text-neutral-800">Mulai dari sini</h2>
    <div class="mt-4 flex flex-wrap gap-3">
        <x-button :href="route('transactions.create')">Catat transaksi</x-button>
        <x-button :href="route('transactions.index')" variant="outline">Lihat ringkasan keuangan</x-button>
        <x-button :href="route('user.articles.index')" variant="outline">Baca artikel</x-button>
    </div>
    <p class="mt-4 text-xs text-neutral-500">Angka di atas hanya contoh. Ringkasan yang dihitung dari input Anda ada di halaman Keuangan.</p>
</div>
@endsection
