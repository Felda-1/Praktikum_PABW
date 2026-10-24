@extends('layouts.admin')
@section('title', 'Tambah artikel')
@section('content')
<x-page-header title="Tambah artikel" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Judul" name="judul" placeholder="Judul artikel" />
    <x-field label="Kategori" name="kategori" type="select" :options="['Pengelolaan kas', 'Dasar keuangan', 'Penetapan harga', 'Modal']" />
    <x-field label="Isi artikel" name="isi" type="textarea" placeholder="Tulis artikel di sini" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Terbitkan</x-button>
        <x-button :href="route('admin.articles.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
