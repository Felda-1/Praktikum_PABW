@extends('layouts.admin')
@section('title', 'Ubah artikel')
@section('content')
<x-page-header title="Ubah artikel" :subtitle="'Artikel #'.$id" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Judul" name="judul" value="Cara memisahkan uang pribadi dan uang usaha" />
    <x-field label="Kategori" name="kategori" type="select" value="Pengelolaan kas" :options="['Pengelolaan kas', 'Dasar keuangan', 'Penetapan harga', 'Modal']" />
    <x-field label="Isi artikel" name="isi" type="textarea" value="Isi artikel contoh." />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan perubahan</x-button>
        <x-button :href="route('admin.articles.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
