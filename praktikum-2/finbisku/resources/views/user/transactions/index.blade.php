@extends('layouts.user')
@section('title', 'Keuangan')
@section('content')
<div class="flex items-start justify-between flex-wrap gap-3 mb-6">
    <div>
        <h1 class="text-2xl font-bold font-display text-neutral-800">Keuangan</h1>
        <p class="text-sm text-neutral-500 mt-1">Catat pemasukan dan pengeluaran, ringkasan dihitung otomatis.</p>
    </div>
    <a href="{{ route('transactions.create') }}" class="inline-flex items-center justify-center gap-2 bg-finbisku-gold-400 text-white px-4 py-2 rounded-btn text-sm font-bold font-display hover:bg-finbisku-gold-500 hover:shadow-md transition-all"><i data-lucide="plus" class="h-4 w-4"></i>Tambah transaksi</a>
</div>

@if (session('status'))
    <div class="mb-5 rounded-btn border border-finbisku-green-200 bg-finbisku-green-100 px-4 py-3 text-sm font-semibold text-finbisku-green-600" role="status">{{ session('status') }}</div>
@endif

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-6">
    <div class="bg-white border border-neutral-200 rounded-card p-6">
        <div class="flex items-center justify-between"><p class="text-sm text-neutral-500">Total pemasukan</p><span class="h-9 w-9 rounded-btn flex items-center justify-center bg-finbisku-green-100 text-finbisku-green-600"><i data-lucide="trending-up" class="h-5 w-5"></i></span></div>
        <p class="mt-3 text-2xl font-bold font-display text-neutral-800">Rp {{ number_format($pemasukan, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white border border-neutral-200 rounded-card p-6">
        <div class="flex items-center justify-between"><p class="text-sm text-neutral-500">Total pengeluaran</p><span class="h-9 w-9 rounded-btn flex items-center justify-center bg-red-50 text-red-600"><i data-lucide="trending-down" class="h-5 w-5"></i></span></div>
        <p class="mt-3 text-2xl font-bold font-display text-neutral-800">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white border border-neutral-200 rounded-card p-6">
        <div class="flex items-center justify-between"><p class="text-sm text-neutral-500">Saldo</p><span class="h-9 w-9 rounded-btn flex items-center justify-center bg-finbisku-gold-100 text-finbisku-gold-600"><i data-lucide="wallet" class="h-5 w-5"></i></span></div>
        <p class="mt-3 text-2xl font-bold font-display {{ $saldo < 0 ? 'text-red-600' : 'text-neutral-800' }}">{{ $saldo < 0 ? '-' : '' }}Rp {{ number_format(abs($saldo), 0, ',', '.') }}</p>
    </div>
    <div class="bg-white border border-neutral-200 rounded-card p-6">
        <div class="flex items-center justify-between"><p class="text-sm text-neutral-500">Margin</p><span class="h-9 w-9 rounded-btn flex items-center justify-center bg-finbisku-green-100 text-finbisku-green-600"><i data-lucide="percent" class="h-5 w-5"></i></span></div>
        <p class="mt-3 text-2xl font-bold font-display text-neutral-800">{{ $margin === null ? '-' : str_replace('.', ',', (string) $margin).'%' }}</p>
    </div>
</div>

<div class="bg-white border border-neutral-200 rounded-card p-6 mb-6">
    <div class="flex items-center justify-between text-sm mb-2">
        <span class="font-semibold text-neutral-700">Kondisi: {{ $kondisi['label'] }}</span>
        <span class="text-neutral-500">Pengeluaran {{ str_replace('.', ',', (string) $rasio) }}% dari pemasukan</span>
    </div>
    <div class="h-3 rounded-full bg-neutral-100 overflow-hidden" role="img" aria-label="Pengeluaran {{ $rasio }} persen dari pemasukan">
        <div class="h-full rounded-full transition-all {{ $kondisi['warna'] }}" style="width: {{ min($rasio, 100) }}%"></div>
    </div>
    <p class="text-sm text-neutral-500 mt-3">{{ $kondisi['pesan'] }}</p>
</div>

@if ($daftar->isEmpty())
    <div class="bg-white border border-neutral-200 rounded-card p-6 text-center py-12">
        <h2 class="font-bold font-display text-neutral-800">Mulai catat transaksi pertamamu</h2>
        <p class="mt-1 text-sm text-neutral-500">Data disimpan sementara di session, bukan di database.</p>
        <a href="{{ route('transactions.create') }}" class="inline-flex items-center justify-center gap-2 bg-finbisku-gold-400 text-white px-4 py-2 rounded-btn text-sm font-bold font-display hover:bg-finbisku-gold-500 hover:shadow-md transition-all mt-5">Tambah transaksi</a>
    </div>
@else
    <div class="flex items-center justify-between flex-wrap gap-3 mb-3">
        <div class="flex gap-2" role="group" aria-label="Filter jenis transaksi">
            <button type="button" data-filter="semua" aria-pressed="true" class="px-3 py-1.5 rounded-btn text-sm font-semibold bg-finbisku-gold-100 text-finbisku-gold-600">Semua</button>
            <button type="button" data-filter="pemasukan" aria-pressed="false" class="px-3 py-1.5 rounded-btn text-sm font-semibold text-neutral-600 hover:bg-neutral-100">Pemasukan</button>
            <button type="button" data-filter="pengeluaran" aria-pressed="false" class="px-3 py-1.5 rounded-btn text-sm font-semibold text-neutral-600 hover:bg-neutral-100">Pengeluaran</button>
        </div>
        <form method="POST" action="{{ route('transactions.reset') }}" onsubmit="return confirm('Kosongkan semua transaksi?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-700">Kosongkan data</button>
        </form>
    </div>

    <div class="bg-white border border-neutral-200 rounded-card overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-neutral-50 text-left text-neutral-500">
                <tr><th class="px-4 py-3 font-semibold">Tanggal</th><th class="px-4 py-3 font-semibold">Kategori</th><th class="px-4 py-3 font-semibold">Keterangan</th><th class="px-4 py-3 font-semibold text-right">Jumlah</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @foreach ($daftar as $t)
                    <tr data-jenis="{{ $t['jenis'] }}" class="hover:bg-neutral-50">
                        <td class="px-4 py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($t['tanggal'])->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $t['kategori'] }}</td>
                        <td class="px-4 py-3 text-neutral-500">{{ $t['keterangan'] ?: '-' }}</td>
                        <td class="px-4 py-3 text-right font-semibold whitespace-nowrap {{ $t['jenis'] === 'pemasukan' ? 'text-finbisku-green-500' : 'text-red-600' }}">{{ $t['jenis'] === 'pemasukan' ? '+' : '-' }}Rp {{ number_format($t['jumlah'], 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-right">
                            <form method="POST" action="{{ route('transactions.destroy', $t['index']) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-neutral-500 hover:text-red-600" aria-label="Hapus transaksi"><i data-lucide="trash-2" class="h-4 w-4"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
