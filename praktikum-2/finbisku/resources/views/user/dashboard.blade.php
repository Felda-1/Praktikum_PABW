@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
<x-page-header title="Dashboard" subtitle="Ringkasan dari data usaha dan transaksi di database." />

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-6">
    @foreach ($stats as $stat)
        <x-stat-card :label="$stat['label']" :value="$stat['value']" :icon="$stat['icon']" :tone="$stat['tone']" />
    @endforeach
</div>

<h2 class="font-bold font-display text-neutral-800 mb-3">Transaksi terbaru</h2>
<div class="bg-white border border-neutral-200 rounded-card overflow-x-auto mb-6">
    <table class="w-full text-sm">
        <thead class="bg-neutral-50 text-left text-neutral-500">
            <tr>
                <th class="px-4 py-3 font-semibold">Tanggal</th>
                <th class="px-4 py-3 font-semibold">Usaha</th>
                <th class="px-4 py-3 font-semibold">Kategori</th>
                <th class="px-4 py-3 font-semibold text-right">Jumlah</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            @forelse ($terbaru as $t)
                <tr class="hover:bg-neutral-50">
                    <td class="px-4 py-3 whitespace-nowrap">{{ $t->tanggal->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">{{ $t->business->nama }}</td>
                    <td class="px-4 py-3">{{ $t->kategori }}</td>
                    <td class="px-4 py-3 text-right font-semibold whitespace-nowrap {{ $t->jenis === 'pemasukan' ? 'text-finbisku-green-500' : 'text-red-600' }}">{{ $t->jenis === 'pemasukan' ? '+' : '-' }}Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-6 text-center text-neutral-500">Belum ada transaksi. Jalankan <code>php artisan db:seed</code>.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="bg-white border border-neutral-200 rounded-card p-6">
    <h2 class="font-bold font-display text-neutral-800">Mulai dari sini</h2>
    <div class="mt-4 flex flex-wrap gap-3">
        <x-button :href="route('transactions.create')">Catat transaksi</x-button>
        <x-button :href="route('transactions.index')" variant="outline">Lihat ringkasan keuangan</x-button>
        <x-button :href="route('user.articles.index')" variant="outline">Baca artikel</x-button>
    </div>
    <p class="mt-4 text-xs text-neutral-500">Kartu dan tabel di atas dihitung dari tabel <code>businesses</code> dan <code>transactions</code>. Halaman Keuangan masih memakai session.</p>
</div>
@endsection