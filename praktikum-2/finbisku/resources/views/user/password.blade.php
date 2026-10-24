@extends('layouts.user')
@section('title', 'Ubah kata sandi')
@section('content')
<x-page-header title="Ubah kata sandi" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Kata sandi saat ini" name="lama" type="password" />
    <x-field label="Kata sandi baru" name="baru" type="password" placeholder="Minimal 8 karakter" />
    <x-field label="Ulangi kata sandi baru" name="konfirmasi" type="password" />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan kata sandi</x-button>
        <x-button :href="route('profile')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
