@extends('layouts.user')
@section('title', 'Profil')
@section('content')
<x-page-header title="Profil saya">
    <x-button :href="route('profile.password')" variant="outline">Ubah kata sandi</x-button>
</x-page-header>
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Nama lengkap" name="nama" value="Rina Pratama" />
    <x-field label="Email" name="email" type="email" value="rina@contoh.id" />
    <x-field label="Nomor HP" name="hp" type="tel" value="081234567890" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan profil</x-button>
        <x-button :href="route('dashboard')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
