@extends('layouts.user')
@section('title', 'Ubah usaha')
@section('content')
<x-page-header title="Ubah usaha" :subtitle="'Usaha #'.$id" />
<form data-demo class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    <x-field label="Nama usaha" name="nama_usaha" value="Warung Makan Bu Sari" />
    <x-field label="Jenis usaha" name="jenis" type="select" value="Kuliner" :options="['Kuliner', 'Minuman', 'Fashion', 'Jasa', 'Lainnya']" />
    <x-field label="Kota" name="kota" value="Bandung" />
    <x-field label="Deskripsi" name="deskripsi" type="textarea" value="Warung makan rumahan dengan menu harian." />
    <div class="flex gap-3 pt-2">
        <x-button type="submit">Simpan perubahan</x-button>
        <x-button :href="route('business.index')" variant="outline">Batal</x-button>
    </div>
</form>
@endsection
