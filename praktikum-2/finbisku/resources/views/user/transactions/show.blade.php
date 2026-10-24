@extends('layouts.user')
@section('title', 'Detail transaksi')
@section('content')
<x-page-header title="Detail transaksi" :subtitle="'Transaksi #'.$id.' (contoh)'">
    <x-button :href="route('transactions.edit', $id)">Ubah transaksi</x-button>
</x-page-header>
<x-detail-list :items="[
    ['label' => 'Jenis', 'value' => 'Pemasukan', 'badge' => true],
    ['label' => 'Kategori', 'value' => 'Penjualan'],
    ['label' => 'Jumlah', 'value' => 'Rp 1.250.000'],
    ['label' => 'Tanggal', 'value' => '03/10/2026'],
    ['label' => 'Keterangan', 'value' => 'Penjualan harian'],
]" />
<div class="mt-5">
    <x-button :href="route('transactions.index')" variant="outline">&larr; Kembali</x-button>
</div>
@endsection
