@extends('layouts.admin')
@section('title', 'Detail user')
@section('content')
<x-page-header :title="$user['nama']" :subtitle="'User #'.$user['id']" />
<x-detail-list :items="[
    ['label' => 'Email', 'value' => $user['email']],
    ['label' => 'Peran', 'value' => $user['peran'], 'badge' => true],
    ['label' => 'Jumlah usaha', 'value' => $user['jumlah_usaha']],
    ['label' => 'Bergabung', 'value' => $user['bergabung']],
]" />
<div class="mt-5">
    <x-button :href="route('admin.users.index')" variant="outline">&larr; Kembali</x-button>
</div>
@endsection
