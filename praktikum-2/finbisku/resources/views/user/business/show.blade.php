@extends('layouts.user')
@section('title', 'Detail usaha')
@section('content')
<x-page-header :title="$business['nama']" :subtitle="'Usaha #'.$business['id']">
    <x-button :href="route('business.edit', $business['id'])">Ubah usaha</x-button>
</x-page-header>
<x-detail-list :items="[
    ['label' => 'Jenis usaha', 'value' => $business['jenis'], 'badge' => true],
    ['label' => 'Kota', 'value' => $business['kota']],
    ['label' => 'Deskripsi', 'value' => $business['deskripsi']],
]" />
<div class="mt-5">
    <x-button :href="route('business.index')" variant="outline">&larr; Kembali</x-button>
</div>
@endsection
