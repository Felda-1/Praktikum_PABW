@extends('layouts.user')
@section('title', 'Tambah usaha')
@section('content')
<x-page-header title="Tambah usaha" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Nama usaha" name="nama_usaha" placeholder="Contoh: Kopi Senja" />
    <x-field label="Jenis usaha" name="jenis" type="select" :options="['Kuliner', 'Minuman', 'Fashion', 'Jasa', 'Lainnya']" />
    <x-field label="Kota" name="kota" placeholder="Contoh: Bandung" />
    <x-field label="Deskripsi" name="deskripsi" type="textarea" placeholder="Ceritakan singkat usahamu" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan usaha</x-button>
        <x-button :href="route('business.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
