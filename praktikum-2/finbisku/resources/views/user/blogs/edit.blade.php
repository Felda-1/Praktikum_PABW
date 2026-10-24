@extends('layouts.user')
@section('title', 'Ubah cerita')
@section('content')
<x-page-header title="Ubah cerita" :subtitle="'Blog #'.$id" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Judul" name="judul" value="Cerita dari dapur Warung Bu Sari" />
    <x-field label="Usaha" name="usaha" type="select" value="Warung Makan Bu Sari" :options="collect($usahaList)->pluck('nama')->all()" />
    <x-field label="Isi cerita" name="isi" type="textarea" value="Cerita usaha ini masih contoh." />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan perubahan</x-button>
        <x-button :href="route('blogs.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
