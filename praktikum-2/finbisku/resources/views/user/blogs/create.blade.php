@extends('layouts.user')
@section('title', 'Tulis cerita')
@section('content')
<x-page-header title="Tulis cerita" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Judul" name="judul" placeholder="Judul cerita usahamu" />
    <x-field label="Usaha" name="usaha" type="select" :options="collect($usahaList)->pluck('nama')->all()" />
    <x-field label="Isi cerita" name="isi" type="textarea" placeholder="Tulis ceritamu di sini" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Terbitkan</x-button>
        <x-button :href="route('blogs.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
