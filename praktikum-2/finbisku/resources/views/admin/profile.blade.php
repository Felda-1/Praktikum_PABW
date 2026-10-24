@extends('layouts.admin')
@section('title', 'Profil admin')
@section('content')
<x-page-header title="Profil admin" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Nama" name="nama" value="Administrator" />
    <x-field label="Email" name="email" type="email" value="admin@finbisku.id" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan profil</x-button>
        <x-button :href="route('admin.dashboard')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
