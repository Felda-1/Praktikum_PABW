@extends('layouts.user')
@section('title', 'Ubah transaksi')
@section('content')
<x-page-header title="Ubah transaksi" :subtitle="'Transaksi #'.$id.' (contoh)'" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Jenis" name="jenis" type="select" value="pemasukan" :options="['pemasukan', 'pengeluaran']" />
    <x-field label="Kategori" name="kategori" type="select" value="Penjualan" :options="['Penjualan', 'Modal', 'Bahan baku', 'Gaji', 'Sewa', 'Listrik dan air', 'Pemasaran', 'Lainnya']" />
    <x-field label="Jumlah (Rp)" name="jumlah" type="number" value="1250000" />
    <x-field label="Tanggal" name="tanggal" type="date" value="2026-10-03" />
    <x-field label="Keterangan" name="keterangan" value="Penjualan harian" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan perubahan</x-button>
        <x-button :href="route('transactions.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
